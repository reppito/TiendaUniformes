@extends('layouts.Administrador')

@section('content')
<div class="col-xs-12 text-center">
  <h3><b>ENVÍOS ENTREGADOS</b></h3>
  @if (count($solicitudesEnvioEntregados) > 0)
  <table class="table">
    <thead>
      <th class="text-center">NRO.</th>
      <th class="text-center">DESTINATARIO</th>
      <th class="text-center">FECHA ENTREGA</th>
      <th class="text-center"></th>
    </thead>
    @foreach ($solicitudesEnvioEntregados as $solicitudEnvioEntregado)
    <tbody>
      <td>{{ $solicitudEnvioEntregado['id'] }}</td>
      <td>{{ $solicitudEnvioEntregado['destinatario'] }}</td>
      <td>{{ $solicitudEnvioEntregado['fechaReporteEntrega'] }}</td>
      <td>
        <form action="/envios-entregados/{{ $solicitudEnvioEntregado['idEnvioEntregado'] }}/report" method="POST">
          {{csrf_field()}}
          <button id="botonReporte" type="submit" class="btn btn-block btn-success">Reporte</button>
        </form>        
      </td>
    </tbody>
    @endforeach
  </table>
  @else
  <h4>No existen registros de envíos entregados.</h4>
  @endif
</div>
@stop