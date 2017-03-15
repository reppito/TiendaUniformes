<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = \TiendaUniformes\Pedido::all();
        return view('Pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materia_prima = \TiendaUniformes\MateriaPrima::all();
        return view('Pedido.create', compact('materia_prima'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $precio1 = \TiendaUniformes\MateriaPrima::where('id', $request['id'])->first()->precio * $request['cantidad1'];
        $precio2=0;
        $precio3=0;
        if($request['id2']!=NULL){
        $precio2 = \TiendaUniformes\MateriaPrima::where('id', $request['id2'])->first()->precio * $request['cantidad2'];
        }
        if($request['id3']!=NULL){
        $precio3 = \TiendaUniformes\MateriaPrima::where('id', $request['id3'])->first()->precio * $request['cantidad3'];
        }
        $precio_total = $precio1 + $precio2 + $precio3;

        /* \TiendaUniformes\Pedido::create([
                  'id_materia'    => $request['id']
                , 'cantidad'              => $request['cantidad']
                , 'precio_total'            => $precioTotal
                , 'fecha_pedido'            => Carbon::now()
                , 'fecha_llegada'            => Carbon::now()->addDays(4)
            ]);*/

        $nuevoPedido = new \TiendaUniformes\Pedido;

        $nuevoPedido->id_materia1 = $request['id'];
        $nuevoPedido->cantidad1 = $request['cantidad1'];
        $nuevoPedido->precio1 = $precio1;

        $nuevoPedido->id_materia2 = $request['id2'];
        $nuevoPedido->cantidad2 = $request['cantidad2'];
        $nuevoPedido->precio2 = $precio2;

        $nuevoPedido->id_materia3 = $request['id3'];
        $nuevoPedido->cantidad3 = $request['cantidad3'];
        $nuevoPedido->precio3 = $precio3;

        $nuevoPedido->precio_total = $precio_total;
        $nuevoPedido->fecha_pedido = Carbon::now();
        $nuevoPedido->fecha_llegada = Carbon::now()->addDays(4);

        $nuevoPedido->save();
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