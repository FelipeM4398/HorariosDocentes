<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDetalle extends Model {
    protected $table = 'horarios_detalles';
    public $timestamps = false;

    public function docente() {
        return $this->belongsTo('App/Usuario', 'foreign_key', 'id_docente');
    }

    public function periodo() {
        return $this->belongsTo('App/PeriodoAcademico', 'foreign_key', 'id_periodo');
    }

    public function asignatura() {
        return $this->belongsTo('App/Asignatura', 'foreign_key', 'id_asignatura');
    }

    public function asignaturas_compartidas(){
        return $this->belongsToMany('App\Asignatura')->as('asignaturas_compartidas');
    }

    public function grupos(){
        return $this->belongsToMany('App\Grupo')
                    ->as('grupos_horarios')
                    ->withPivot('cantidad_estudiantes');
    }
}
