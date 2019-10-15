<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table = 'periodos_academicos';
    public $timestamps = false;

    public function horarioDetalle()
    {
        return $this->hasMany('App/HorarioDetalle', 'id_periodo');
    }

    public function disponibilidadDocente()
    {
        return $this->hasMany('App/DisponibilidadDocente', 'id_periodo');
    }

    public function scopeAño($query, $año)
    {
        if ($año) {
            return $query->where('año', 'LIKE', "$año%");
        }
    }

    public function scopePeriodo($query, $periodo)
    {
        if ($periodo) {
            if ($periodo == "3") {
                return $query;
            }
            return $query->where('periodo', '=', "$periodo");
        }
    }
}
