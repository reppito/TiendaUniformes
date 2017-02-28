@extends('layouts.Administrador')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'conductores.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('REGISTRO DE CONDUCTOR',null,['class'=>'.text-left '])!!}
    </div>

    <br>
    {!!Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cédula de Identidad'])!!}
    <br>
    {!!Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre'])!!}
    <br>
    {!!Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido'])!!}
    <br>
    {!!Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker', 'placeholder' => 'Fecha Nacimiento'])!!}
    <br>
    {!!Form::text('fecha_inicio_contrato', null, ['class' => 'form-control datepicker', 'placeholder' => 'Fecha de Inicio de Contrato'])!!}
    <br>
    {!!Form::text('grado_licencia_conducir', null, ['class' => 'form-control', 'placeholder' => 'Grado de Licencia de Conducir'])!!}
    <br>    
    {{ Form::button('Registrar <span class="glyphicon glyphicon-user"></span>', ['class' => "btn btn-primary btn-block", 'type' => 'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop
