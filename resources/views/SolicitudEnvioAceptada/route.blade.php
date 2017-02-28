@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>RUTAS DE TRANSPORTE DISPONIBLES</b></h3>
  <form action="/rutas-transporte/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearRuta" type="submit" class="btn btn-success">Crear Ruta de Transporte</button>
  </form>
  @if (count($rutasTransporte) > 0)
  @else
  <h4>No se ha planificado ninguna ruta de transporte.</h4>
  @endif
</div>
@stop