@extends('layouts.Administrador')

@section('content')
<div class="col-xs-10 col-xs-offset-2">
<h3><b>Lista de Pedidos:</b></h3>
 @if (count($pedidos) > 0)
  <table class="table">
    <thead>
      <th>Nro de Pedido</th>
      <th>Producto 1</th>
      <th>Cantidad</th>
      <th>Producto 2</th>
      <th>Cantidad</th>
      <th>Producto 3</th>
      <th>Cantidad</th>
      <th>Precio Total</th>
      <th>Fecha de Pedido</th>
      <th>Fecha de Llegada</th>
    </thead>

  @foreach ($pedidos as $pedido)
  <tbody>
    <td>{{$pedido->id_pedido}}</td>
    <td>{{$pedido->id_materia1}}</td>
    <td>{{$pedido->cantidad1}}</td>
    <td>{{$pedido->id_materia2}}</td>
    <td>{{$pedido->cantidad2}}</td>
    <td>{{$pedido->id_materia3}}</td>
    <td>{{$pedido->cantidad3}}</td>
    <td>{{$pedido->precio_total}}</td>
    <td>{{$pedido->fecha_pedido}}</td>
    <td>{{$pedido->fecha_llegada}}</td>
    <td>
    {!!Form::open(['route'=>'inventario.store','method'=>'POST'])!!}
    <input type="hidden" name="id_materia1" value="{{ $pedido->id_materia1 }}"/>
    <input type="hidden" name="cantidad1" value="{{ $pedido->cantidad1 }}"/>
    <input type="hidden" name="id_materia2" value="{{ $pedido->id_materia2 }}"/>
    <input type="hidden" name="cantidad2" value="{{ $pedido->cantidad2 }}"/>
    <input type="hidden" name="id_materia3" value="{{ $pedido->id_materia3 }}"/>
    <input type="hidden" name="cantidad3" value="{{ $pedido->cantidad3 }}"/>
    <button id="botonAceptarPedido" type="submit" class="btn btn-success">Aceptar Pedido</button>
    {!!Form::close()!!}
    </td>
  </tbody>
  @endforeach
  </table>
  @else
  <h3><b>No se ha hecho ningun pedido.</b></h3>
  @endif
  <form action="/pedido/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearPedido" type="submit" class="btn btn-success">Realizar un pedido.</button>
  </form>
</div>
@stop