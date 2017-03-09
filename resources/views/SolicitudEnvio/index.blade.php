@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>SOLICITUDES DE ENVÍO PENDIENTES</b></h3>
  <div class="row col-md-offset-4 col-md-4 text-center">
    <form action="/solicitudes-envio/create" method="GET">
      <button type="submit" class="btn btn-block btn-success">Crear</button>
    </form>    
  </div>
  @if (count($solicitudesEnvio) > 0)
  <table class="table">
    <thead>
      <th class="text-center">NRO.</th>
      <th class="text-center">DESCRIPCIÓN</th>
      <th class="text-center">DESTINATARIO</th>
      <th class="text-center">DIRECCIÓN ENTREGA</th>
      <th class="text-center">FECHA ESTIMADA</th>
      <th class="text-center"></th>
      <!--<th class="text-center"></th>-->
    </thead>
    @foreach ($solicitudesEnvio as $solicitudEnvio)
    <tbody>
      <td>{{$solicitudEnvio['id']}}</td>
      <td>{{$solicitudEnvio['descripcion']}}</td>
      <td>{{$solicitudEnvio['destinatario']}}</td>
      <td>{{$solicitudEnvio['direccion_entrega']}}</td>
      <td>{{$solicitudEnvio['fecha_estimada']}}</td>

      <td>
        <form action="/solicitudes-envio/{{$solicitudEnvio['id']}}/accept" method="POST">
          {{csrf_field()}}
          <button id="botonAceptarSolicitud" type="submit" class="btn btn-block btn-success">Aceptar</button>
        </form>
      </td>

      <!--
      <td>
        <form action="/solicitudes-envio/{{$solicitudEnvio['id']}}/reject" method="POST">
          {{csrf_field()}}
          <button id="botonRechazarSolicitud" type="submit" class="btn btn-block btn-danger">Rechazar</button>
        </form>
      </td>
      -->
      </tbody>
    @endforeach
  </table>
  @else
  <h4>No hay solicitudes de envío pendientes.</h4>
  @endif
</div>
@stop