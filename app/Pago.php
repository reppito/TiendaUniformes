<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table="pagos";
    protected $fillable=['id_factura','cantidad_pagar','referencia_bancaria','aprobacion_pago'];
}
