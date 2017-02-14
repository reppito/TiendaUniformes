@extends('layouts.principal')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'usuario.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('REGISTRO DE USUARIO',null,['class'=>'.text-left '])!!}
    </div>

    <br>
     {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre'])!!}
     <br>
     {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese su apellido'])!!}
     <br>
     {!!Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Ingrese su cedula'])!!}
     <br>
     {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email'])!!}
    <br>
    {!!Form::password('contrasena',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}
    <br>
    {{ Form::button('Registrar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop
