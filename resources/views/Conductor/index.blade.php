@extends('layouts.Administrador')

@section('content')
<div class="col-xs-6 col-xs-offset-3">
  <table class="table">
    <thead>
      <th>Cédula de Identidad</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha de Nacimiento</th>
      <th>Fecha de Inicio de Contrato</th>
      <th>Grado de Licencia de Conducir</th>
      <th>Activo</th>
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
