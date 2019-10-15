<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DisponibilidadDocente extends Pivot
{
    protected $table = 'disponibilidades_docentes';
    public $incrementing = true;
    public $timestamps = false;

    public function dias()
    {
        return $this->belongsToMany('App\Dia', 'disponibilidades_dias', 'id_dispo', 'id_dia')
            ->withPivot([
                'disponible'
            ]);
    }

    public function jornada()
    {
        return $this->belongsToMany('App\Jornada', 'disponibilidades_dias', 'id_dispo', 'id_jornada')
            ->withPivot([
                'disponible'
            ]);
    }

    public function docente()
    {
        return $this->belongsTo('App\Usuario', 'id_docente');
    }

    public function periodo()
    {
        return $this->belongsTo('App\PeriodoAcademico', 'id_periodo');
    }
}
