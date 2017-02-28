@extends('layouts.Administrador')
@section('content')
<div class="col-md-offset-3 col-md-6">
  <h3 class="text-center"><b>CREACIÓN DE NUEVA RUTA DE TRANSPORTE</b></h3>
    {!!Form::open(['route'=>'rutas-transporte.store','method'=>'POST'])!!}
        {!! Form::select('conductores', $objetosDisponibles['conductores']->pluck('nombre')->all(), null, ['class' => 'form-control', 'dropdown-menu']) !!}
        {!! Form::select('unidadesTransporte', $objetosDisponibles['unidadesTransporte']->pluck('nombre')->all(), null, ['class' => 'form-control', 'dropdown-menu']) !!}
        {!! Form::select('solicitudesEnvio', $objetosDisponibles['solicitudesEnvio']->pluck('descripcion')->all(), null, ['class' => 'form-control', 'dropdown-menu']) !!}
      <div class="row col-md-offset-3 col-md-6">
        {{ Form::button('Crear', ['class' => "btn btn-primary btn-block", 'type' => 'submit']) }}
      </div>
    {!!Form::close()!!}
  </div>
</div>

<br>
@stop

protected $fillable = ['id_unidad_transporte', 'id_conductor', 'id_solicitud_envio_aceptada', 'id_usuario_creador', 'created_at', 'updated_at'];
