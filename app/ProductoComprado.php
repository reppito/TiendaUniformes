<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class ProductoComprado extends Model
{
    protected $table="producto_comprados";
    protected $fillable=['id_factura','id_producto','cantidad'];
}
