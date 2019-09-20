<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model {
    protected $table = 'periodos_academicos';
    public $timestamps = false;

    public function horarioDetalle() {
        return $this->hasMany('App/HorarioDetalle', 'foreign_key');
    }

    public function disponibilidadDocente() {
        return $this->hasMany('App/DisponibilidadDocente', 'foreign_key');
    }
}
