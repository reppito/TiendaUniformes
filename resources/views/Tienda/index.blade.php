@extends('layouts.principal')

@section('content')


  <div class="col-md-8 col-md-offset-2">
     <table class="table">
       <thead>
         <th>Descripcion</th>
         <th>Precio</th>
         <th>Disponible</th>
         <th>Foto</th>

       </thead>

  @foreach ($productos as $producto)
   <tbody>
    <td>{{$producto->descripcion}}</td>
    <td>{{$producto->precio}}</td>
    <td>{{$producto->disponibles}}</td>
    <td><img src="productos/{{$producto->path}}" alt="" style="width:100px;"></td>
    @if (Auth::check())
      {!!Form::open(['route'=>['carrito.store','producto'=>$producto->id,],'method'=>'POST'])!!}
        <td>{!!Form::selectRange('cantidad', 1, $producto->disponibles) !!}</td>
        <td>{{ Form::button('Agregar Al Carrito ',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}</td>
      {!!Form::close()!!}
    @endif




    </tbody>
  @endforeach


     </table>
   </div>



@stop
