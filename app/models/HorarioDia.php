<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDia extends Model
{
    protected $table = 'horarios_dias';
    public $timestamps = false;

    public function dia(){
        return $this->belongsTo('App\Dia', 'foreign_key', 'id_dia');
    }

    public function salon(){
        return $this->belongsTo('App\Salon', 'foreign_key', 'id_salon');
    }

    public function frecuencia() {
        return $this->belongsTo('App\FrecuenciaHoraria', 'foreign_key', 'id_frecuencia');
    }

    public function horarioDetalle(){
        return $this->belongsTo('App\HorarioDetalle', 'foreign_key', 'id_horario_detalle');
    }
}
