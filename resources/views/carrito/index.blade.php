@extends('layouts.principal')
@section('content')
  <div class="col-md-8 col-md-offset-2">
     <table class="table">
       <thead>
         <th>producto</th>
         <th>precio Unidad</th>
         <th>cantidad</th>
         <th>Subtotal</th>


       </thead>

  @foreach ($carritos as $carrito)
   <tbody>
    <td><img src="productos/{{$carrito->path}}" alt="" style="width:100px;"></td>
    <td>{{$carrito->precio}}</td>
    <td>{{$carrito->cantidad}}</td>
    <td>{{$carrito->precio *$carrito->cantidad}}</td>
    {!!Form::open(['route'=>['carrito.destroy','carrito'=>$carrito->id,],'method'=>'DELETE'])!!}
      <td>{{ Form::button('Eliminar ',['class'=>"btn btn-danger btn-block", 'type'=>'submit']) }}</td>
    {!!Form::close()!!}

    </tbody>

  @endforeach
    <tbody>
   <td></td>
   <td></td>
   <td>Total a Pagar :</td>
   <td> {!!$pago!!}</td>
   </tbody>

     </table>
   </div>

   <div class="col-md-5 col-md-offset-5">
     <a href="/factura"><button type="button" class="btn btn-success">
       Pagar
     </button></a>
   </div>


@endsection
