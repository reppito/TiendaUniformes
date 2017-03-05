@extends('layouts.principal')
@section('content')
  {!!Form::open(['route'=>['factura.store','direccion'=>$direccion,'pago'=>$pago],'method'=>'POST'])!!}

<div class=" col-xs-4 col-xs-offset-4 form-group">
  <div class="  col-xs-offset-4">
    {!!Form::label('Registrar Bauche de Pago',null,['class'=>'.text-center '])!!}
  </div>
  <br>
  <label class="text text-info">La cantidad a pagar es : {!!$pago!!}</label>
   <br>
   {!!Form::text('referencia_bancaria',null,['class'=>'form-control','placeholder'=>'Ingrese numero de bauche'])!!}
  <br>
  <br>
  {{ Form::button('pagar <span class="glyphicon glyphicon-user"></span>',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}



</div>
{!!Form::close()!!}
<br>
<br>
@stop
