<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table = 'pedido';
     protected $primaryKey = 'id_pedido';
     protected $fillable = [
    'cantidad1',
    'precio1',
    'cantidad2',
    'precio2',
    'cantidad3',
    'precio3',
    'precio_total',
    'fecha_pedido',
    'fecha_llegada'
    ];
}
