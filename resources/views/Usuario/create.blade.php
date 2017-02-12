@extends('layouts.principal')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open()!!}
  <div class="form-group">

    {!!Form::label('nombre',null,['class'=>'.text-left'])!!}
    <br>
     {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre'])!!}
     <br>
     {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido'])!!}
     <br>
     {!!Form::text('edad',null,['class'=>'form-control','placeholder'=>'Ingrese su edad'])!!}
     <br>
     {!!Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Ingrese su cedula'])!!}
     <br>
     {!!Form::text('e-mail',null,['class'=>'form-control','placeholder'=>'Ingrese su email'])!!}
    <br>
    {!!Form::password('contrasena',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}
    <br>
    {!!Form::button('Registrar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block"])!!}
  </div>
  {!!Form::close()!!}
</div>

<br>
@stop
