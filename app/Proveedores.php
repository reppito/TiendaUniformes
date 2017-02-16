<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
    'nombre',
    'direccion',
    'telefono'
    ];
}
