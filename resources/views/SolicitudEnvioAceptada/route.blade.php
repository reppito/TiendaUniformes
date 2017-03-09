@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>RUTAS DE TRANSPORTE DISPONIBLES</b></h3>
  <form action="/rutas-transporte/create" method="GET">
    {{csrf_field()}}
    <button id="botonCrearRuta" type="submit" class="btn btn-success">Crear Ruta de Transporte</button>
  </form>
  @if (count($rutasTransporte) > 0)
  <form action="/solicitudes-envio-aceptadas/{{ $idSolicitudEnvioAceptada }}/assign" method="POST">
    <table class="table">
      <thead>
        <th class="text-center">NRO.</th>
        <th class="text-center">CONDUCTOR</th>
        <th class="text-center">VEHICULO</th>
        <th class="text-center">CARGA</th>
        <th class="text-center">FECHA ESTIMADA DE ENTREGA</th>
        <th></th>
      </thead>
       @foreach ($rutasTransporte as $rutaTransporte)
      <tbody>
        <td>{{ $rutaTransporte['id'] }}</td>
        <td>{{ $rutaTransporte['conductor'] }}</td>
        <td>{{ $rutaTransporte['vehiculo'] }}</td>
        <td>{{ $rutaTransporte['carga'] }}</td>
        <td><input type="date" class="date datepicker" name="fecha_estimada_entrega"></td>
  	    <td>
            {{csrf_field()}}
            <input type="hidden" name="id_solicitud_envio_aceptada" value="{{ $idSolicitudEnvioAceptada }}"/>
            <input type="hidden" name="id_ruta_transporte" value="{{ $rutaTransporte['id'] }}"/>
            <button id="botonAsignar" type="submit" class="btn btn-block btn-success">Asignar</button>
        </td>
      </tbody>
    </form>
    @endforeach
  </table>	  
  @else
  <h4>No se ha planificado ninguna ruta de transporte.</h4>
  @endif
</div>
@stop