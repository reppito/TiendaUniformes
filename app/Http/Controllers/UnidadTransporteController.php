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

class UnidadTransporteController extends Controller
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
        $carga = RutaTransporte::all()
            ->where('id_unidad_transporte', $id)
            ->map(function ($rutaTransporte, $key) {
                return SolicitudEnvioAceptada::where('id', $rutaTransporte->id_solicitud_envio_aceptada)->first();
            })
            ->reject(function ($solicitudAceptada, $key) {
                   EnvioRetornado::where('id_solicitud_envio_aceptada', $solicitudAceptada->id)->count() > 0
                || EnvioExtraviado::where('id_solicitud_envio_aceptada', $solicitudAceptada->id)->count() > 0
                || EnvioEntregado::where('id_solicitud_envio_aceptada', $solicitudAceptada->id)->count() > 0
                || RutaTransporte::where('id_solicitud_envio_aceptada', $solicitudAceptada->id)->count() > 0
                ;
            })
            ->map(function ($solicitudAceptada, $key) {
                return SolicitudEnvio::where('id', $solicitudAceptada->id_solicitud_envio)->first();
            })
            ->map(function ($solicitudEnvio, $key) {
                $descripcion = Producto::where('id', ProductoComprado::where('id', $solicitudEnvio->id_producto_comprado)->first()->id_producto)->first()->descripcion;
                
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                $direccion = Direccion::where('id', $solicitudEnvio->id_direccion_destino)->first();

                $direccion_entrega = $direccion->calle . ', ' . $direccion->ciudad . ', ' . $direccion->zip_code;

                return [
                      'id' => $solicitudEnvio->id
                    , 'descripcion' => $descripcion
                    , 'direccion' => $direccion_entrega
                    , 'fecha' => $solicitudEnvio->fecha_entrega_estimada
                ];
            });
            
        return view('UnidadTransporte.show', ['carga' => $carga]);
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
