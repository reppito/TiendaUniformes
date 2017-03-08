<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function aprobarPagos(){

       $pagos= \TiendaUniformes\Pago::where('aprobacion_pago',0)->get();

      return view('Tienda.aprobarPagos',compact('pagos'));


     }
     public function addCarrito($id)
     {

       return "entre aqui";
     }
     public function pagoAprobado(Request $id)
     {  $pagoAprobado=\TiendaUniformes\Pago::find($id->pago);
        $pagoAprobado->aprobacion_pago=1;
        $pagoAprobado->save();
      
        return redirect('tienda/aprobarPagos');
     }


    public function index()
    {  $productos=\TiendaUniformes\Producto::all();
        return view('Tienda.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
       $tipo_productos= \TiendaUniformes\TipoProducto::pluck('nombre_producto','id');
        return view('Tienda.create',compact('tipo_productos'));
        }
        else return redirect('tienda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto= $request->file('path');
        \TiendaUniformes\Producto::create([
          'descripcion' => $request['descripcion']
          ,'id_tipo'=> $request['id_tipo']
          ,'disponibles' => $request['disponibles']
          ,'precio'  => $request['precio']
          ,'path' => Carbon::now()->second.$producto->getClientOriginalName()

          ]);

          \Storage::disk('local')->put(Carbon::now()->second.$producto->getClientOriginalName(),  \File::get($producto));
          return redirect('tienda');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
