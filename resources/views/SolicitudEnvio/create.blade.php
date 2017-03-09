@extends('layouts.Administrador')

@section('content')
<div class="col-md-offset-1 col-md-10">
  <h3 class="text-center"><b>NUEVAS SOLICITUDES DE ENVÍO</b></h3>
  @if ($productosComprados->count() > 0)
  <div class="form-group">
  <table class="table">
  <thead>
    <th class="text-center">COMPRADOR</th>
    <th class="text-center">DESCRIPCIÓN</th>
    <th class="text-center">CANTIDAD</th>
    <th class="text-center">FECHA DE ENTREGA</th>
    <th class="text-center"></th>
  </thead>
  @foreach ($productosComprados as $productoComprado)
  <tbody>
    <td>{{ $productoComprado['comprador'] }}</td>
    <td>{{ $productoComprado['descripcion'] }}</td>
    <td class="text-center">{{ $productoComprado['cantidad'] }}</td>
    <form action="{{ route('solicitudes-envio.store') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id_producto_comprado" value="{{ $productoComprado['id'] }}"/>
      <td class="text-center"><input name="fecha_entrega_estimada" type="date" class="date datepicker"/></td>
      <td class="text-center"><button type="submit" class="btn btn-success btn-block">Crear</button></td>
    </form>
  </tbody>
  @endforeach
  </div>
  @else
  <h4 class="text-center">No existen compras sin solicitudes de envío.</h4>
  @endif
</div>
@stop