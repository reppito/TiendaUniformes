<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function ingresar(){

       if(Auth::check()){
        $productos= \TiendaUniformes\Producto::all();
        return view('Tienda.index',compact('productos'));
    }
       return view('Usuario.login');
     }



    public function index()
    {  if(Auth::check()){
        $usuarios= \TiendaUniformes\Usuario::all();
        return view('Usuario.index',compact('usuarios'));
        }    
        else return redirect('tienda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         \TiendaUniformes\Usuario::create([
           'nombre' => $request['nombre']
           ,'apellido'=> $request['apellido']
           ,'cedula' => $request['cedula']
           ,'email'  => $request['email']
           ,'password' => bcrypt($request['password'])
           , 'id_privilegio'=> '1'
         ]);
         return "usuario registrado";
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
