@extends('layouts.Administrador')

@section('content')
<div class="col-xs-8 col-xs-offset-2">
  <table class="table">
    <thead>
      <th class="text-center">Cédula de Identidad</th>
      <th  class="text-center">Nombre</th>
      <th class="text-center">Apellido</th>
      <th class="text-center">Fecha de Nacimiento</th>
      <th class="text-center">Fecha de Inicio de Contrato</th>
      <th class="text-center">Grado de Licencia de Conducir</th>
      <th class="text-center">Activo</th>
    </thead>

  @foreach ($conductores as $conductor)
  <tbody>
     <td>{{$conductor->cedula}}</td>
     <td>{{$conductor->nombre}}</td>
     <td>{{$conductor->apellido}}</td>
     <td>{{$conductor->fecha_nacimiento}}</td>
     <td>{{$conductor->fecha_inicio_contrato}}</td>
     <td>{{$conductor->grado_licencia_conducir}}</td>
     <td>{{$conductor->activo}}</td>
  </tbody>
  @endforeach
  </table>
</div>
@stop
