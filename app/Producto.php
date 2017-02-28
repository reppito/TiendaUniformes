<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Producto extends Model
{
    protected $table="productos";
    protected $fillable=['id_tipo','descripcion','disponibles','precio','path'];

    public function setPathAtributte(){
      $this->attributes['path']= Carbon::now()->second.$path->getClientOriginalName();
      $name= Carbon::now()->second.$path->getClientOriginalName();
      \Storage::disk('local')->put($name,\File::get($path));    }
}
