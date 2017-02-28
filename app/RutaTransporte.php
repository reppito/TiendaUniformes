<?php

namespace TiendaUniformes;

use Illuminate\Database\Eloquent\Model;

class RutaTransporte extends Model
{
    protected $table = 'rutas_transporte';
    protected $fillable = ['id_unidad_transporte', 'id_conductor', 'id_solicitud_envio_aceptada', 'id_usuario_creador', 'created_at', 'updated_at'];

    public function noCompletada() {
    	return EnvioEntregado::where('id_solicitud_envio_aceptada', $this->id_solicitud_envio_aceptada)->count() == 0 
    		&& EnvioRetornado::where('id_solicitud_envio_aceptada', $this->id_solicitud_envio_aceptada)->count() == 0 
    		&& EnvioExtraviado::where('id_solicitud_envio_aceptada', $this->id_solicitud_envio_aceptada)->count() == 0;
    }
}
