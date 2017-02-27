<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Usuario extends \Eloquent implements Authenticatable
{
  use AuthenticableTrait;
  protected $table="usuarios";
  protected $fillable=['nombre','apellido','cedula','email','password','id_privilegio'];
  protected $hidden=['password','id','id_privilegio'];


}
