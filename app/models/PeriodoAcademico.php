<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table = 'periodos_academicos';
    public $timestamps = false;
    protected $fillable = [
        'año',
        'periodo'
    ];

    public function horarioDetalle()
    {
        return $this->hasMany('App/HorarioDetalle', 'id_periodo');
    }

    public function disponibilidadDocente()
    {
        return $this->hasMany('App/DisponibilidadDocente', 'id_periodo');
    }

    public function disponibilidadesDias()
    {
        return $this->hasManyThrough('App\DisponibilidadDia', 'App\DisponibilidadDocente', 'id_periodo', 'id_dispo');
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
