<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use \TiendaUniformes\SolicitudEnvio;
use \TiendaUniformes\ProductoComprado;
use \TiendaUniformes\Producto;
use \TiendaUniformes\Usuario;
use \TiendaUniformes\Direccion;

class SolicitudEnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TO-DO: reemplazar al terminar las relaciones entre modelos.
        $solicitudesEnvio = SolicitudEnvio::all()
            ->map(function ($solicitudEnvio, $key) {
                $descripcion = Producto::where('id', ProductoComprado::where('id', $solicitudEnvio->id_producto_comprado)->first()->id_producto)->first()->descripcion;
                
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                $direccion = Direccion::where('id', $solicitudEnvio->id_direccion_destino)->first();

                $direccion_entrega = $direccion->calle . ', ' . $direccion->ciudad . ', ' . $direccion->zip_code;

                return [
                      'descripcion' => $descripcion
                    , 'destinatario' => $destinatario
                    , 'direccion_entrega' => $direccion_entrega
                    , 'fecha_estimada' => $solicitudEnvio->fecha_entrega_estimada
                    , 'id_solicitud_envio' => $solicitudEnvio->id
                ];
            });
        return view('SolicitudEnvio.index', compact('solicitudesEnvio'));
    }

    public function accept($id)
    {

    }

    public function reject($id) 
    {

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
