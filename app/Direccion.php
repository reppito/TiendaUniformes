<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table= 'direcciones';
    protected $fillable= ['id_user','ciudad','estado','calle','detalles','zip_code'];
}
