@extends('layouts.Administrador')

@section('content')
<div class="col-xs-6 col-xs-offset-3">
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
    </thead>

  @foreach ($proveedores as $proveedor)
  <tbody>
     <td>{{$proveedor->nombre}}</td>
     <td>{{$proveedor->direccion}}</td>
     <td>{{$proveedor->telefono}}</td>
  </tbody>
  @endforeach
  </table>
</div>
@stop
