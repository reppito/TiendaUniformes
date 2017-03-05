@extends('layouts.principal')
@section('content')
  <div class="col-md-8 col-md-offset-2">
     <table class="table">
       <thead>
         <th>Estado</th>
         <th>zip_code</th>
         <th>ciudad</th>
         <th>calle</th>
         <th>detalles</th>


       </thead>

  @foreach ($direcciones as $direccion)
   <tbody>
    <td>{{$direccion->estado}}</td>
    <td>{{$direccion->zip_code}}</td>
    <td>{{$direccion->ciudad}}</td>
    <td>{{$direccion->calle}}</td>
    <td>{{$direccion->detalles}}</td>
    
    </tbody>

  @endforeach


     </table>
   </div>
   <div class="col-md-5 col-md-offset-5">
     <a href="/direccion/create"><button type="button" class="btn btn-success">
       añadir direccion
     </button></a>
   </div>
@stop
