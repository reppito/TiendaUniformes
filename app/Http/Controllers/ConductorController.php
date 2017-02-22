<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductores = \TiendaUniformes\Conductor::all();
        return view('Conductor.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Conductor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// TO-DO: hacer importación para recortar código.
        \TiendaUniformes\Conductor::create([
        		  'cedula' => $request['cedula']
        		, 'nombre' => $request['nombre']
        		, 'apellido' => $request['apellido']
                , 'fecha_nacimiento' => $request['fecha_nacimiento']
                , 'fecha_inicio_contrato' => $request['fecha_inicio_contrato']
                , 'grado_licencia_conducir' => $request['grado_licencia_conducir']
        		, 'activo' => '1'
        	]);
        return 'Conductor almacendao correctamente.';
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
