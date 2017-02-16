@extends('layouts.Administrador')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'conductor.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('REGISTRO DE CONDUCTOR',null,['class'=>'.text-left '])!!}
    </div>

    <br>
     {!!Form::text('cedula_identidad',null,['class'=>'form-control','placeholder'=>'Cédula de Identidad'])!!}
    <br>
    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}
    <br>
    {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido'])!!}
    <br>
    {{ Form::button('Registrar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop
