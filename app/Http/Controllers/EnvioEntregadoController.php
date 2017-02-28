<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use \TiendaUniformes\EnvioEntregado;
use \TiendaUniformes\SolicitudEnvio;
use \TiendaUniformes\SolicitudEnvioAceptada;
use \TiendaUniformes\Usuario;

class EnvioEntregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudesEnvioEntregados = EnvioEntregado::all()
            ->map(function($envioEntregado, $key) {
                $solicitudEnvio = SolicitudEnvio::where('id', SolicitudEnvioAceptada::where('id', $envioEntregado->id_solicitud_envio_aceptada)->first()->id_solicitud_envio)->first();
            
                $usuarioSolicitante = Usuario::where('id', $solicitudEnvio->id_usuario_solicitante)->first(); 
                $destinatario = $usuarioSolicitante->nombre . ' ' . $usuarioSolicitante->apellido;

                return [
                  'id' => $solicitudEnvio->id
                , 'destinatario' => $destinatario
                , 'fechaReporteEntrega' => $envioEntregado->fecha_reporte_entrega
                , 'idEnvioEntregado' => $envioEntregado->id
            ];
        });

        //var_dump($solicitudesEnvioEntregados);
        //die();

        return view('EnvioEntregado.index', [
              'solicitudesEnvioEntregados' => $solicitudesEnvioEntregados
            ]);
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
