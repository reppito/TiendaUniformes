@extends('layouts.Administrador')

@section('content')
<div class="col-md-8 col-md-offset-2">
   <table class="table">
     <thead>
       <th>Nombre</th>
       <th>Apellido</th>
       <th>Cedula</th>
       <th>Correo</th>
       <th>privilegio</th>
     </thead>

       @foreach ($usuarios as $usuario )
         <tbody>
         <td>{{$usuario->nombre}}</td>
         <td>{{$usuario->apellido}}</td>
         <td>{{$usuario->cedula}}</td>
         <td>{{$usuario->email}}</td>
         <td>{{$usuario->id_privilegio}}</td>
         </tbody>
       @endforeach


   </table>
   <div>
@stop
