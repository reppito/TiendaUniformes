@extends('layouts.Administrador')

@section('content')
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
@stop
