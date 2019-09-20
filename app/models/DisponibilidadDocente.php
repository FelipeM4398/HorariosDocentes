<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisponibilidadDocente extends Model {
    protected $table = 'disponibilidades_docente';
    public $timestamps = false;

    public function dias(){
        return $this->belongsToMany('App\Dia')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }

    public function jornada(){
        return $this->belongsToMany('App\Jornada')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }

    public function docente(){
        return $this->belongsTo('App\Usuario', 'foreign_key', 'id_docente');
    }

    public function periodo(){
        return $this->belongsTo('App\PeriodoAcademico', 'foreign_key', 'id_periodo');
    }
}
