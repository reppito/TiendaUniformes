@extends('layouts.Administrador')

@section('content')
<div class="col-xs-6 col-xs-offset-3">
<h3><b>Catalogo de Materia Prima:</b></h3>
<div class="col-xs-6 col-xs-offset-3">
@if (count($materia_prima) > 0)
  </div>
  <table class="table">
    <thead>
      <br>
      <th>ID</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th>Id Proveedor</th>
    </thead>

  @foreach ($materia_prima as $materia_prima)
  <tbody>
    <td>{{$materia_prima->id}}</td>
    <td>{{$materia_prima->descripcion}}</td>
    <td>{{$materia_prima->precio}}</td>
    <td>{{$materia_prima->id_prov}}</td>
  </tbody>
  @endforeach
  </table>
  @else
  <h3><b>No hay productos de materia prima.</b></h3>
  @endif
  <form action="/materia_prima/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearMateriaPrima" type="submit" class="btn btn-success">Ingresar Materia Prima.</button>
  </form>
</div>
@stop
