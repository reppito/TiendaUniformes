<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table="facturas";
    protected $fillable=['id_usuario','id_dir'];
}
