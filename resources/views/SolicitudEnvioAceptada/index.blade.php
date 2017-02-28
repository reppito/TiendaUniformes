@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>SOLICITUDES DE ENVÍO ACEPTADAS</b></h3>
  @if (count($solicitudesEnvioAceptadas) > 0)
  <table class="table">
    <thead>
      <th class="text-center">NRO.</th>
      <th class="text-center">DESCRIPCIÓN</th>
      <th class="text-center">DESTINATARIO</th>
      <th class="text-center">DIRECCIÓN ENTREGA</th>
      <th class="text-center">FECHA ESTIMADA</th>
      <th class="text-center"></th>
    </thead>
    @foreach ($solicitudesEnvioAceptadas as $solicitudEnvioAceptada)
    <tbody>
      <td>{{$solicitudEnvioAceptada['id']}}</td>
      <td>{{$solicitudEnvioAceptada['descripcion']}}</td>
      <td>{{$solicitudEnvioAceptada['destinatario']}}</td>
      <td>{{$solicitudEnvioAceptada['direccion_entrega']}}</td>
      <td>{{$solicitudEnvioAceptada['fecha_estimada']}}</td>

      <td>
        @if ($solicitudEnvioAceptada['asignada_a_ruta'] == false)
        <form action="/solicitudes-envio-aceptadas/{{$solicitudEnvioAceptada['id']}}/route" method="POST">
          {{csrf_field()}}
          <button id="botonAsignarRuta" type="submit" class="btn btn-block btn-success">Asignar a Ruta</button>
        </form>
        @else
        <form action="/solicitudes-envio-aceptadas/{{$solicitudEnvioAceptada['id']}}/report" method="POST">
          {{csrf_field()}}
          <button id="botonActualizarEstado" type="submit" class="btn btn-block btn-success">Reportar Entrega</button>
        </form>
        @endif
      </td>
      
      </tbody>
    @endforeach
  </table>
  @else
  <h4>No hay solicitudes de envío aceptadas.</h4>
  @endif
</div>
@stop