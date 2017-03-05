<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use \TiendaUniformes\SolicitudEnvio;
use \TiendaUniformes\SolicitudEnvioAceptada;
use \TiendaUniformes\SolicitudEnvioRechazada;
use \TiendaUniformes\ProductoComprado;
use \TiendaUniformes\Producto;
use \TiendaUniformes\Usuario;
use \TiendaUniformes\Direccion;
use \TiendaUniformes\EnvioEntregado;
use \TiendaUniformes\EnvioExtraviado;
use \TiendaUniformes\EnvioRetornado;
use \TiendaUniformes\RutaTransporte;
use \TiendaUniformes\UnidadTransporte;
use \TiendaUniformes\Conductor;
use Auth;

class SolicitudEnvioAceptadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudesEnvioAceptadas = SolicitudEnvioAceptada::all()
            ->reject(function ($solicitudEnvioAceptada, $key) {
                return EnvioEntregado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0 
                    || EnvioExtraviado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0 
                    || EnvioRetornado::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0;
            })
            ->map(function ($solicitudEnvioAceptada, $key) {
                $solicitudEnvio = SolicitudEnvio::where('id', $solicitudEnvioAceptada->id_solicitud_envio)->first();

                $descripcion = Producto::where('id', ProductoComprado::where('id', $solicitudEnvio->id_producto_comprado)->first()->id_producto)->first()->descripcion;
                
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                $direccion = Direccion::where('id', $solicitudEnvio->id_direccion_destino)->first();

                $direccion_entrega = $direccion->calle . ', ' . $direccion->ciudad . ', ' . $direccion->zip_code;

                return [
                      'id' => $solicitudEnvioAceptada->id
                    , 'descripcion' => $descripcion
                    , 'destinatario' => $destinatario
                    , 'direccion_entrega' => $direccion_entrega
                    , 'fecha_estimada' => $solicitudEnvio->fecha_entrega_estimada
                    , 'asignada_a_ruta' => RutaTransporte::where('id_solicitud_envio_aceptada', $solicitudEnvioAceptada->id)->count() > 0
                ];                
            });

        return view('SolicitudEnvioAceptada.index', compact('solicitudesEnvioAceptadas'));
    }

    public function route($id) 
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
                    , 'carga' => SolicitudEnvioAceptada::where('id', $rutaTransporte->id_solicitud_envio_aceptada)
                        ->sum('cantidad_productos')
                ];
            });

        return view('SolicitudEnvioAceptada.route', [
              'rutasTransporte' => $rutasTransporte
            , 'idSolicitudEnvioAceptada' => $id
        ]);
    }

    public function assign(Request $request, $id)
    {
        $rutaTransporte = RutaTransporte::where('id', $request['id_ruta_transporte'])->first();

        $nuevaRuta = new RutaTransporte;

        $nuevaRuta->id_conductor = $rutaTransporte->id_conductor;
        $nuevaRuta->id_unidad_transporte = $rutaTransporte->id_unidad_transporte;
        $nuevaRuta->id_solicitud_envio_aceptada = $id;
        $nuevaRuta->id_usuario_creador = Auth::user()->id;

        $nuevaRuta->save();

        return $this->index();
    }

    public function report($id)
    {
        return view('SolicitudEnvioAceptada.report', ['idSolicitudEnvioAceptada' => $id]);
    }

    public function received(Request $request, $id)
    {
        $nuevoEnvioEntregado = new EnvioEntregado;

        $nuevoEnvioEntregado->fecha_reporte_entrega = $request['fecha_reporte_entrega'];
        $nuevoEnvioEntregado->id_solicitud_envio_aceptada = $id;
        $nuevoEnvioEntregado->id_usuario_que_reporta = Auth::user()->id;

        $nuevoEnvioEntregado->save();

        return $this->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
