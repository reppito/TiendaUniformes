@extends('layouts.Administrador')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'materia_prima.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('Agregar Materia Prima',null,['class'=>'.text-left '])!!}
    </div>

    <br>
     {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
    <br>
    {!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio'])!!}
    <br>
    <select class="form-control" id="proveedores" name="id">
        @foreach ($proveedores as $p)
        <option value="{{ $p['id'] }}">{{ $p['nombre']}}</option>
        @endforeach
      </select>
    <br>
    {{ Form::button('Agregar Materia Prima',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop