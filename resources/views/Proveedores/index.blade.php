@extends('layouts.Administrador')
@section('content')
<div class="col-xs-6 col-xs-offset-3">
@if (count($proveedores) > 0)
<h3><b>Lista de Proveedores</b></h3>
  <table class="table">
    <thead>
    <br>
      <th>ID</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
    </thead>

  @foreach ($proveedores as $proveedor)
  <tbody>
     <td>{{$proveedor->id}}</td>
     <td>{{$proveedor->nombre}}</td>
     <td>{{$proveedor->direccion}}</td>
     <td>{{$proveedor->telefono}}</td>
  </tbody>
  @endforeach
  </table>
  @else
  <h3><b>No hay proveedores.</b></h3>
  @endif
  <form action="/proveedores/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearProveedor" type="submit" class="btn btn-success">Registrar un proveedor.</button>
  </form>
</div>
@stop
