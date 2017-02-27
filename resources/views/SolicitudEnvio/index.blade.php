@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>SOLICITUDES DE ENVÍO PENDIENTES</b></h3>
  @if (count($solicitudesEnvio) > 1)
  <table class="table">
    <thead>
      <th class="text-center">DESCRIPCIÓN</th>
      <th class="text-center">DESTINATARIO</th>
      <th class="text-center">DIRECCIÓN ENTREGA</th>
      <th class="text-center">FECHA ESTIMADA</th>
      <th class="text-center"></th>
      <th class="text-center"></th>
    </thead>
    <tbody>
    @foreach ($solicitudesEnvio as $solicitudEnvio)
      <td>{{$solicitudEnvio['descripcion']}}</td>
      <td>{{$solicitudEnvio['destinatario']}}</td>
      <td>{{$solicitudEnvio['direccion_entrega']}}</td>
      <td>{{$solicitudEnvio['fecha_estimada']}}</td>
      <td><button id="botonAceptarSolicitud" type="button" class="btn btn-block btn-success">Aceptar</button></td>
      <td><button id="botonRechazarSolicitud" type="button" class="btn btn-block btn-danger">Rechazar</button></td>
      </tbody>
    @endforeach
  </table>
  @else
  <h4>No hay solicitudes de envío pendientes.</h4>
  @endif
</div>
@stop