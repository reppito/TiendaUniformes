@extends('layouts.Administrador')

@section('content')
<div class="col-md-offset-4 col-md-4">
  <h3 class="text-center"><b>REPORTAR ENVÍO COMO ENTREGADO</b></h3>
  <br/>
  <form action="/solicitudes-envio-aceptadas/{{ $idSolicitudEnvioAceptada }}/report/received" method="POST">
    {{ csrf_field() }}
    <div class="form-group">  	
      <label for="fecha-entrega">Fecha de entrega: </label>
      <input type="date" class="form-control" name="fecha_reporte_entrega"/>
    </div>
    <div class="form-group text-center">
      <button type="submit" class="btn btn-success">Reportar</button>
    </div>    
  </form>
</div>
@stop