@extends('layouts.Administrador')

@section('content')
<div class="col-xs-6 col-xs-offset-3">
  <table class="table">
    <thead>
      <th>Cédula de Identidad</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Activo</th>
    </thead>

  @foreach ($conductores as $conductor)
  <tbody>
     <td>{{$conductor->cedula_identidad}}</td>
     <td>{{$conductor->nombre}}</td>
     <td>{{$conductor->apellido}}</td>
     <td>{{$conductor->activo}}</td>
  </tbody>
  @endforeach
  </table>
</div>
@stop
