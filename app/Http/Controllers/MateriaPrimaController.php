<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materia_prima = \TiendaUniformes\MateriaPrima::all();
        return view('MateriaPrima.index', compact('materia_prima'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = \TiendaUniformes\Proveedores::all();
        return view('MateriaPrima.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* \TiendaUniformes\MateriaPrima::create([
                  'descripcion'    => $request['descripcion']
                , 'precio'              => $request['precio']
                , 'id_prov'            => $request['id_prov']
            ]);*/
            $nueva_materia=new \TiendaUniformes\MateriaPrima;
            $nueva_materia->descripcion=$request['descripcion'];
            $nueva_materia->precio=$request['precio'];
            $nueva_materia->id_prov=$request['id'];
            $nueva_materia->save();
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
