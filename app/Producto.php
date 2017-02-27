<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table="productos";
    protected $fillable=['id_tipo','descripcion','disponibles','precio','path'];
}
