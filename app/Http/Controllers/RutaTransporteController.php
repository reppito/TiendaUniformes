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

class RutaTransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $solicitudesEnvio = SolicitudEnvio::all()
            ->reject(function ($solicitudEnvio, $key) {
                return SolicitudEnvioAceptada::where('id', $solicitudEnvio->id)->count() > 0 || SolicitudEnvioRechazada::where('id', $solicitudEnvio->id)->count() > 0;
            })
            ->map(function ($solicitudEnvio, $key) {
                $descripcion = Producto::where('id', ProductoComprado::where('id', $solicitudEnvio->id_producto_comprado)->first()->id_producto)->first()->descripcion;
                
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                $direccion = Direccion::where('id', $solicitudEnvio->id_direccion_destino)->first();

                $direccion_entrega = $direccion->calle . ', ' . $direccion->ciudad . ', ' . $direccion->zip_code;

                return [
                      'id' => $solicitudEnvio->id
                    , 'descripcion' => $destinatario . ' - ' . $direccion_entrega . ' - ' 
                        . $solicitudEnvio->distancia_destino . ' Km - ' 
                        . $solicitudEnvio->fecha_entrega_estimada
                ];
            });

        $objetosDisponibles = [
              'conductores' => $conductores
            , 'unidadesTransporte' => $unidadesTransporte
            , 'solicitudesEnvio' => $solicitudesEnvio];

        return view('RutaTransporte.create', compact('objetosDisponibles'));
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
