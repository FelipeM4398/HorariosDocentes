<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model {
    protected $table = 'jornadas';
    public $timestamps = false;

    public function disponibilidadDocente(){
        return $this->belongsToMany('App\DisponibilidadDocente')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }

    public function dias(){
        return $this->belongsToMany('App\Dia')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }
}
