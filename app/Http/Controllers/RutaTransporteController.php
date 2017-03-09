<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use \TiendaUniformes\Conductor;
use \TiendaUniformes\RutaTransporte;
use \TiendaUniformes\UnidadTransporte;
use \TiendaUniformes\SolicitudEnvio;
use \TiendaUniformes\ProductoComprado;
use \TiendaUniformes\SolicitudEnvioAceptada;
use \TiendaUniformes\SolicitudEnvioRechazada;
use \TiendaUniformes\Direccion;
use \TiendaUniformes\Producto;
use \TiendaUniformes\Usuario;
use \TiendaUniformes\EnvioEntregado;
use \TiendaUniformes\EnvioRetornado;
use \TiendaUniformes\EnvioExtraviado;
use Auth;

class RutaTransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutasTransporte = RutaTransporte::all()
            ->reject(function ($rutaTransporte, $key) {
                return !UnidadTransporte::where('id', $rutaTransporte->id_unidad_transporte)->first()->disponible;
            })
            ->unique('id_unidad_transporte')
            ->map(function ($rutaTransporte, $key) {
                $conductor = Conductor::where('id', $rutaTransporte->id_conductor)->first();
                $vehiculo = UnidadTransporte::where('id', $rutaTransporte->id_unidad_transporte)->first();
                return [
                      'id' => $rutaTransporte->id
                    , 'conductor' => $conductor->nombre . ' ' . $conductor->apellido
                    , 'vehiculo' => $vehiculo->marca . ' ' . $vehiculo->modelo
                    , 'idUnidadTransporte' => $vehiculo->id
                ];
            });

        return view('RutaTransporte.index', compact('rutasTransporte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conductores = Conductor::all()
            ->reject(function ($conductor, $key) {
                return RutaTransporte::where('id_conductor', $conductor->id)->
                    get()->filter(function ($rutaTransporte, $key) {
                        return $rutaTransporte->noCompletada();
                    })->count() > 0;
            })
            ->map(function ($conductor, $key) {
                return ['id' => $conductor->id, 'nombre' => $conductor->nombre . ' ' . $conductor->apellido];
            });

        $unidadesTransporte = UnidadTransporte::all()
            ->reject(function ($unidadTransporte, $key) {
                return RutaTransporte::where('id_unidad_transporte', $unidadTransporte->id)->
                    get()->filter(function ($rutaTransporte, $key) {
                        return $rutaTransporte->noCompletada();
                    })->count() > 0;
            })
            ->map(function ($unidadTransporte, $key) {
                return ['id' => $unidadTransporte->id, 'nombre' => $unidadTransporte->marca . ' ' . $unidadTransporte->modelo];
            });

        $solicitudesEnvioAceptadas = SolicitudEnvioAceptada::all()
            ->reject(function ($solicitudEnvioAceptada, $key) {
                return EnvioRetornado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0
                    || EnvioExtraviado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0
                    || EnvioEntregado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0
                    || RutaTransporte::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0
                    ;
            })
            ->map(function ($solicitudEnvioAceptada, $key) {
                $solicitudEnvio = SolicitudEnvio::where('id', $solicitudEnvioAceptada->id_solicitud_envio)->first();

                $descripcion = Producto::where('id', ProductoComprado::where('id', $solicitudEnvio->id_producto_comprado)->first()->id_producto)->first()->descripcion;
                
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                $direccion = Direccion::where('id', $solicitudEnvio->id_direccion_destino)->first();

                $direccion_entrega = $direccion->calle . ', ' . $direccion->ciudad . ', ' . $direccion->zip_code;

                return [ 
                    'id' => $solicitudEnvioAceptada->id, 'descripcion' => $destinatario . ' - ' . $direccion_entrega . ' - ' 
                        . $solicitudEnvio->distancia_destino . ' Km - ' 
                        . $solicitudEnvio->fecha_entrega_estimada
                ];
            });

        return view('RutaTransporte.create', [
              'conductores' => $conductores
            , 'unidadesTransporte' => $unidadesTransporte
            , 'solicitudesEnvioAceptadas' => $solicitudesEnvioAceptadas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request['fecha_entrega_estimada']) {
            return 'Debe indicar la fecha en que se espera que sea entregado el producto.';
        }
        else {
            $nuevaRuta = new RutaTransporte;

            $nuevaRuta->id_conductor = $request['id_conductor'];
            $nuevaRuta->id_unidad_transporte = $request['id_unidad_transporte'];
            $nuevaRuta->id_solicitud_envio_aceptada = $request['id_solicitud_envio_aceptada'];
            $nuevaRuta->id_usuario_creador = Auth::user()->id;

            $nuevaRuta->save();

            $solicitudEnvio = SolicitudEnvio::all()->where('id', SolicitudEnvioAceptada::all()->where('id', $request['id_solicitud_envio_aceptada'])->first()->id_solicitud_envio)->first();

            $solicitudEnvio->fecha_entrega_estimada = $request['fecha_entrega_estimada'];
            $solicitudEnvio->save();        

            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
