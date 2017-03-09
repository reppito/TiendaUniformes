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
Use \TiendaUniformes\Factura;
use Auth;

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
                    , 'descripcion' => $descripcion
                    , 'destinatario' => $destinatario
                    , 'direccion_entrega' => $direccion_entrega
                    , 'fecha_estimada' => $solicitudEnvio->fecha_entrega_estimada
                ];
            });

        return view('SolicitudEnvio.index', compact('solicitudesEnvio'));
    }

    public function accept($id)
    {
        $solicitudEnvioAcepta = new SolicitudEnvioAceptada;

        $solicitudEnvioAcepta->id_solicitud_envio = $id;
        $solicitudEnvioAcepta->cantidad_productos = ProductoComprado::where('id', SolicitudEnvio::where('id', $id)->first()->id_producto_comprado)->first()->cantidad;
        $solicitudEnvioAcepta->id_usuario_que_acepta = Auth::user()->id;
        $solicitudEnvioAcepta->save();

        return $this->index();
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
        $productosComprados = ProductoComprado::all()
            ->filter(function ($productoComprado, $key) {
                return SolicitudEnvio::where('id_producto_comprado', $productoComprado->id)->count() == 0;
            })
            ->map(function ($productoComprado, $key) {
                
                $usuarioComprador = Usuario::where('id', Factura::where('id', $productoComprado->id_factura)->first()->id_usuario)->first();
                $nombreComprador = $usuarioComprador->nombre . ' ' . $usuarioComprador->apellido;

                $descripcionProducto = Producto::where('id', $productoComprado->id_producto)->first()->descripcion;

                return [
                      'id' => $productoComprado->id
                    , 'comprador' => $nombreComprador
                    , 'descripcion' => $descripcionProducto
                    , 'cantidad' => $productoComprado->cantidad
                    ];
            });

        return view('SolicitudEnvio.create', ['productosComprados' => $productosComprados]);
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
            return 'Debe indicar la fecha en la que espera que llegue el producto.';
        }
        else {
            $id_direccion_destino = Factura::where('id', ProductoComprado::where('id', $request['id_producto_comprado'])->first()->id_factura)->first()->id_dir;
            $distancia_destino = 100;

            $nuevaSolicitud = new SolicitudEnvio;

            $nuevaSolicitud->id_producto_comprado = $request['id_producto_comprado'];
            $nuevaSolicitud->id_direccion_destino = $id_direccion_destino;
            $nuevaSolicitud->fecha_entrega_estimada = $request['fecha_entrega_estimada'];
            $nuevaSolicitud->distancia_destino = 100;
            $nuevaSolicitud->id_usuario_solicitante = Auth::user()->id;

            $nuevaSolicitud->save();

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
