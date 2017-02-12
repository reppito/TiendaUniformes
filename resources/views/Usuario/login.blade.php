@extends('layouts.principal')
@section('content')
  <div class="col-xs-4 col-xs-offset-4">
    {!!Form::open()!!}
    <div class="form-group">
      <div class=" col-xs-offset-4">
        {!!Form::label('Ingrese a su cuenta',null,['class'=>'.text-left '])!!}
      </div>

      <br>
       {!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese su correo o cedula'])!!}
       <br>
       {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña'])!!}
       <br>

      {!!Form::button('Ingresar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block"])!!}
    </div>
    {!!Form::close()!!}
  </div>
  <br>
  <div class="col-sm-3 col-sm-offset-5">
    <span class="text-center">¿No estas registrado? <a href="{{URL::to('usuario/create')}}">Ingresa Aqui</a></span>

  </div>
  <br>
  <br>
@stop
