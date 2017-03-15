@extends('layouts.Administrador')

@section('content')
<div class="col-xs-5 col-xs-offset-4">
@if (count($inventario) > 0)
<h3><b>Materiales en el inventario:</b></h3>
  <table class="table">
    <thead>
      <th>Id Producto</th>
      <th>Descripcion</th>
      <th>Cantidad</th>
    </thead>
  @foreach ($inventario as $inventario)
  <tbody>
     <td>{{$inventario->id_materia}}</td>
     <td>{{$inventario->descripcion}}</td>
     <td>{{$inventario->cantidad}}</td>
  </tbody>
  @endforeach
  </table>
  @else
  <b><h3>No hay inventario almacenado.</h3></b>
  @endif
</div>
@stop