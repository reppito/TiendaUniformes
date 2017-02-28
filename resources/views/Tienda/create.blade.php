@extends('layouts.administrador')

@section('content')

  {!!Form::open(['route'=>'tienda.store','method'=>'POST','files'=> true])!!}

<div class=" col-xs-4 col-xs-offset-4 form-group">
  <div class="  col-xs-offset-4">
    {!!Form::label('Nuevo Producto',null,['class'=>'.text-left '])!!}
  </div>

  <br>

   <br>
   {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'descripcion'])!!}
  <br>

  {!!Form::number('precio',null,['class'=>'form-control','placeholder'=>'Precio por unidad'])!!}
  <br>
  {!!Form::number('disponibles',null,['class'=>'form-control','placeholder'=>'Precio por unidad'])!!}
  <br>
  {!!Form::label('Elija que tipo de producto es')!!}
  {!!Form::select('id_tipo',$tipo_productos)!!}
  <br>
  {!!Form::label('Elija imagen')!!}
  {!!Form::file('path')!!}
  <br>
  {{ Form::button('añadir <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}



</div>
{!!Form::close()!!}
<br>
<br>
@stop
