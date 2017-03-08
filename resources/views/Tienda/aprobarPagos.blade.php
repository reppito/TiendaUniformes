@extends('layouts.Administrador')
@section('content')

  <div class="col-md-8 col-md-offset-2">
     <table class="table">
       <thead>
         <th>Pago n°</th>
         <th>Total a pagar</th>
         <th>Numero de Vauche</th>


       </thead>

  @foreach ($pagos as $pago)
   <tbody>
    <td>{{$pago->id}}</td>
    <td>{{$pago->cantidad_pagar}}</td>
    <td>{{$pago->referencia_bancaria}}</td>

    @if (Auth::check())
      {!!Form::open(['route'=>['Tienda.pagoAprobado','pago'=>$pago->id],'method'=>'PUT'])!!}

        <td>{{ Form::button('AprobarPago',['class'=>"btn btn-primary btn-block", 'type'=>'submit']) }}</td>
      {!!Form::close()!!}
    @endif




    </tbody>
  @endforeach


     </table>
   </div>

@endsection
