<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductores';

    protected $fillable = ['cedula', 'nombre', 'apellido', 'fecha_nacimiento', 'fecha_inicio_contrato', 'grado_licencia_conducir', 'activo'];
}
