<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model{
    protected $table = 'dias';
    public $timestamps = false;

    public function disponibilidadDocentes(){
        return $this->belongsToMany('App\DisponibilidadDocente')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }

    public function jornadas(){
        return $this->belongsToMany('App\Jornada')
                    ->as('disponibilidades_dias')
                    ->withPivot([
                        'disponible'
                    ]);
    }

    public function horarios(){
        return $this.hasMany('App/HorarioDia', 'foreign_key');
    }
}
