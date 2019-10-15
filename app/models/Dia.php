<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'dias';
    public $timestamps = false;

    public function disponibilidadDocentes()
    {
        return $this->belongsToMany('App\DisponibilidadDocente', 'disponibilidades_dias', 'id_dia', 'id_dispo')
            ->withPivot([
                'disponible'
            ]);
    }

    public function jornadas()
    {
        return $this->belongsToMany('App\Jornada', 'disponibilidades_dias', 'id_dia', 'id_jornada')
            ->withPivot([
                'disponible'
            ]);
    }

    public function horarios()
    {
        return $this->hasMany('App/HorarioDia', 'id_dia');
    }
}
