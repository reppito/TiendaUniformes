@extends('layouts.Administrador')
@section('content')
<div class="col-md-offset-3 col-md-6">
  <h3 class="text-center"><b>CREACIÓN DE NUEVA RUTA DE TRANSPORTE</b></h3>
  <br/>
  @if ($conductores->count() == 0)
  <h4 class="text-center">No hay conductores disponibles.</h4>
  @elseif ($unidadesTransporte->count() == 0)
  <h4 class="text-center">No hay unidades de transporte disponibles.</h4>
  @elseif ($solicitudesEnvioAceptadas->count() == 0)
  <h4 class="text-center">No hay solicitudes de envío a las que asociar una ruta de transporte.</h4>
  @else
  <form action="{{ route('rutas-transporte.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="conductores"><b>Conductores disponibles: </b></label>
      <select class="form-control" id="conductores" name="id_conductor">
        @foreach ($conductores as $conductor)
        <option value="{{ $conductor['id'] }}">{{ $conductor['nombre'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="unidades-transporte"><b>Unidades de transporte disponibles: </b></label>
      <select class="form-control" id="unidades-transporte" name="id_unidad_transporte">
        @foreach ($unidadesTransporte as $unidadTransporte)
        <option value="{{ $unidadTransporte['id'] }}">{{ $unidadTransporte['nombre'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="solicitudes-envio-aceptadas"><b>Solicitudes de envío sin asignar: </b></label>
      <select class="form-control" id="solicitudes-envio-aceptadas" name="id_solicitud_envio_aceptada">
        @foreach ($solicitudesEnvioAceptadas as $solicitudEnvioAceptada)
        <option value="{{ $solicitudEnvioAceptada['id'] }}">{{ $solicitudEnvioAceptada['descripcion'] }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="col-md-offset-4 col-md-4 btn btn-success">Crear</button>
  </form>
  @endif
</div>
@stop
