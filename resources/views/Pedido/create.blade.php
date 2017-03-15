@extends('layouts.Administrador')
@section('content')
<div class="col-xs-4 col-xs-offset-4">
  {!!Form::open(['route'=>'pedido.store','method'=>'POST'])!!}
  <div class="form-group">
    <div class=" col-xs-offset-4">
      {!!Form::label('Hacer Pedido',null,['class'=>'.text-left '])!!}
    </div>

    <br>
     <select class="form-control" id="materia_prima" name="id">
     <option selected disabled>Producto 1</option>
        @foreach ($materia_prima as $mp)
        <option value="{{ $mp['id'] }}">{{ $mp['id']}} -- {{ $mp['descripcion']}} -- {{$mp['precio']}} Bs.</option>
        @endforeach
      </select>
      <br>
     {!!Form::text('cantidad1',null,['class'=>'form-control','placeholder'=>'Cantidad'])!!}
     <br>

     <select class="form-control" id="materia_prima" name="id2">
     <option selected disabled>Producto 2 (Opcional)</option>
        @foreach ($materia_prima as $mp)
        <option value="{{ $mp['id'] }}">{{ $mp['id']}} -- {{$mp['descripcion']}} -- {{$mp['precio']}} Bs.</option>
        @endforeach
      </select>
      <br>
      {!!Form::text('cantidad2',null,['class'=>'form-control','placeholder'=>'Cantidad'])!!}
     <br>

     <select class="form-control" id="materia_prima" name="id3">
     <option selected disabled>Producto 3 (Opcional)</option>
        @foreach ($materia_prima as $mp)
        <option value="{{ $mp['id'] }}">{{ $mp['id']}} -- {{ $mp['descripcion']}} -- {{$mp['precio']}} Bs.</option>
        @endforeach
      </select>
      <br>
      {!!Form::text('cantidad3',null,['class'=>'form-control','placeholder'=>'Cantidad'])!!}
     <br>

    {{ Form::button('Registrar',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}

  </div>
  {!!Form::close()!!}
</div>

<br>
@stop