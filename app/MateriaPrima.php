<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'materia_prima';

    protected $fillable = [
  		  'cedula_identidad'
  		, 'nombre'
  		, 'apellido'
  		, 'activo'
  	];
}
