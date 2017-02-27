@extends('layouts.principal')
@section('content')

  {!!Form::open(['route'=>'login.store','method'=>'POST'])!!}

  <div class=" col-xs-4 col-xs-offset-4 form-group">
    <div class="  col-xs-offset-4">
      {!!Form::label('REGISTRO DE USUARIO',null,['class'=>'.text-left '])!!}
    </div>

    <br>

     <br>
     {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email'])!!}
    <br>
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}
    <br>
    {{ Form::button('Ingresar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}
    <br>
    <span class="text center">¿No estas registrado? <a href="{{URL::to('usuario/create')}}">ingresa aqui</a></span>
  </div>
  {!!Form::close()!!}
  <br>
  <br>
@stop
