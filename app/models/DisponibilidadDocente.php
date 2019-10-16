<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DisponibilidadDocente extends Pivot
{
    protected $table = 'disponibilidades_docentes';
    public $incrementing = true;
    public $timestamps = false;

    public function dispoDias()
    {
        return $this->hasMany('App\DisponibilidadDia', 'id_dispo');
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
