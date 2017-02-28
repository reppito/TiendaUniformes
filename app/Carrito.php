<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table="carritos";
    protected $fillable=["id_user","id_producto","cantidad"];
}
