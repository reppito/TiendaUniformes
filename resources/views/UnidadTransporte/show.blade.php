@extends('layouts.Administrador')

@section('content')
<div class="col-md-offset-2 col-md-8 text-center">
  <h3><b>CARGA DE UNIDADAD DE TRANSPORTE</b></h3>
  @if ($carga->count() > 0)
  <table class="table">
    <thead>
      <th class="text-center">DESCRIPCIÓN</th>
      <th class="text-center">DIRECCIÓN</th>
      <th class="text-center">FECHA ESTIMADA DE ENTREGA</th>
    </thead>
    @foreach ($carga as $c)
    <tbody>
      <td>{{ $c['descripcion'] }}</td>
      <td>{{ $c['direccion'] }}</td>
      <td class="text-center">{{ $c['fecha'] }}</td>
    </tbody>
    @endforeach
    </table>  
  @else
  <h4 class="text-center">La unidad de transporte se encuentra descargada.</h4>
  @endif
</div>
@stop