<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductores';

  	protected $fillable = [
  		  'cedula_identidad'
  		, 'nombre'
  		, 'apellido'
  		, 'activo'
  	];
}
