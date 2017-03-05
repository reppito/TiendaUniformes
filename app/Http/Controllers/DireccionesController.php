<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check()) {
        $direcciones= \TiendaUniformes\Direccion::where('id_user',Auth::user()->id)->get();
        return view('Direcciones.index',compact('direcciones'));
      }


        return redirect('tienda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
        return view('Direcciones.create');
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
      if(Auth::check()){
         \TiendaUniformes\Direccion::create([
           'id_user' => Auth::user()->id
           ,'ciudad'=> $request['ciudad']
           ,'estado'=> $request['estado']
           ,'calle'=> $request['calle']
           ,'detalles'=> $request['detalles']
           ,'zip_code'=> $request['zip_code']
         ]);
         return redirect('/');
       }
         else
         return redirect('/');
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
        
    }
}
