<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {
    protected $table = 'grupos';
    public $timestamps = false;

    public function programa(){
        return $this->belongsTo('App\Programa', 'foreign_key', 'id_programa');
    }

    public function jornadaAcademica(){
        return $this->belongsTo('App\JornadaAcademica', 'foreign_key', 'id_jornada_academica');
    }

    public function sede(){
        return $this->belongsTo('App\Sede', 'foreign_key', 'id_sede');
    }

    public function horarios(){
        return $this->belongsToMany('App\HorarioDetalle')
                    ->as('grupos_horarios')
                    ->withPivot('cantidad_estudiantes');
    }
}
