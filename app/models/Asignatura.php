<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {
    protected $table = 'asignaturas';
    public $timestamps = false;

    public function docentes(){
        return $this->belongsToMany('App\Usuario')->as('docentes_asignaturas');
    }

    public function horario() {
        return $this->hasMany('App/HorarioDetalle', 'foreign_key');
    }

    public function horarioCompartido(){
        return $this->belongsToMany('App\HorarioDetalle')->as('asignaturas_compartidas');
    }
}
