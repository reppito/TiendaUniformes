<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $table="usuarios";
  protected $fillable=['nombre','apellido','cedula','email','password','id_privilegio'];
  protected $hidden=['password','id','id_privilegio'];


}
