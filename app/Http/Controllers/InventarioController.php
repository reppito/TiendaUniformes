<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

class InventarioController extends Controller
{
	 public function index()
    {
        $inventario = \TiendaUniformes\Inventario::all();
        return view('Inventario.index', compact('inventario'));
    }

    public function create()
    {
        $pedido = \TiendaUniformes\Pedido::all();
        return view('Inventario.create', compact('pedido'));
    }

    public function store(Request $request)
    {
        $nuevoInventario = new \TiendaUniformes\Inventario;
        $nuevoInventario->id_materia = $request['id_materia1'];
        $nuevoInventario->cantidad = $request['cantidad1'];
        $nuevoInventario->descripcion = \TiendaUniformes\MateriaPrima::where('id', $request['id_materia1'])->first()->descripcion;
         
        if (\TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario->descripcion)->count() > 0) {

            $ItemInventario = \TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario->descripcion)->first();
            $ItemInventario->cantidad += $nuevoInventario->cantidad;
            $ItemInventario->save();
        }

        else {
            $nuevoInventario->save();
        }



        if($request['id_materia2']!=NULL){

        $nuevoInventario2 = new \TiendaUniformes\Inventario;
        $nuevoInventario2->id_materia = $request['id_materia2'];
        $nuevoInventario2->cantidad = $request['cantidad2'];
        $nuevoInventario2->descripcion = \TiendaUniformes\MateriaPrima::where('id', $request['id_materia2'])->first()->descripcion;

        if (\TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario2->descripcion)->count() > 0) {

            $ItemInventario2 = \TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario2->descripcion)->first();
            $ItemInventario2->cantidad += $nuevoInventario2->cantidad;
            $ItemInventario2->save();
        }
        else{
        $nuevoInventario2->save();
        }
        }


        if($request['id_materia3']!=NULL){

        $nuevoInventario3 = new \TiendaUniformes\Inventario;
        $nuevoInventario3->id_materia = $request['id_materia3'];
        $nuevoInventario3->cantidad = $request['cantidad3'];
        $nuevoInventario3->descripcion = \TiendaUniformes\MateriaPrima::where('id', $request['id_materia3'])->first()->descripcion;

        if (\TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario3->descripcion)->count() > 0) {

            $ItemInventario3 = \TiendaUniformes\Inventario::all()->where('descripcion', $nuevoInventario3->descripcion)->first(); 
            $ItemInventario3->cantidad += $nuevoInventario3->cantidad;
            $ItemInventario3->save();
        }
        else{
        $nuevoInventario3->save();
        }
        }
    }
}
