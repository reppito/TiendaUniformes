@extends('layouts.Administrador')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'proveedores.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('Registro de Proveedor',null,['class'=>'.text-left '])!!}
    </div>

    <br>
     {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre'])!!}
     <br>
     {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese su direccion'])!!}
     <br>
     {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese su telefono'])!!}
     <br>
    {{ Form::button('Ingresar Proveedor <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop
