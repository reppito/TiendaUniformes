@extends('layouts.principal')
@section('content')
  {!!Form::open(['route'=>'direccion.store','method'=>'POST','files'=> true])!!}

<div class=" col-xs-4 col-xs-offset-4 form-group">
  <div class="  col-xs-offset-4">
    {!!Form::label('Nueva direccion',null,['class'=>'.text-left '])!!}
  </div>
  <br>
   <br>
   {!!Form::number('zip_code',null,['class'=>'form-control','placeholder'=>'zip code'])!!}
  <br>
  {!!Form::text('estado',null,['class'=>'form-control','placeholder'=>'estado'])!!}
  <br>
  {!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'ciudad'])!!}
  <br>
  {!!Form::text('calle',null,['class'=>'form-control','placeholder'=>'calle'])!!}
  <br>
  {!!Form::text('detalles','',['class'=>'form-control','placeholder'=>'detalles'])!!}
  <br>
  <br>
  {{ Form::button('añadir <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}



</div>
{!!Form::close()!!}
<br>
<br>
@endsection
