<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornadas';
    public $timestamps = false;

    public function disponibilidadDocente()
    {
        return $this->belongsToMany('App\DisponibilidadDocente', 'disponibilidades_dias', 'id_jornada', 'id_dispo')
            ->withPivot([
                'disponible'
            ]);
    }

    public function dias()
    {
        return $this->belongsToMany('App\Dia', 'disponibilidades_dias', 'id_jornada', 'id_dia')
            ->withPivot([
                'disponible'
            ]);
    }
}
