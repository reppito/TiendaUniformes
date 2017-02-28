@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>RUTAS DE TRANSPORTE DISPONIBLES</b></h3>
  <form action="/rutas-transporte/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearRuta" type="submit" class="btn btn-success">Crear Ruta de Transporte</button>
  </form>
  @if (count($rutasTransporte) > 0)
  <table class="table">
    <thead>
      <th class="text-center">NRO.</th>
      <th class="text-center">CONDUCTOR</th>
      <th class="text-center">VEHICULO</th>
      <th class="text-center">CARGA</th>
    </thead>
		@foreach ($rutasTransporte as $rutaTransporte)
		<tbody>
			<td>{{ $rutaTransporte['id'] }}</td>
			<td>{{ $rutaTransporte['conductor'] }}</td>
			<td>{{ $rutaTransporte['vehiculo'] }}</td>
			<td>{{ $rutaTransporte['carga'] }}</td>  	
		</tbody>
		@endforeach
		</table>	  
  @else
  <h4>No se ha planificado ninguna ruta de transporte.</h4>
  @endif
</div>
@stop