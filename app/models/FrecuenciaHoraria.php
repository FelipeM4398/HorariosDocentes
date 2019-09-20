<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrecuenciaHoraria extends Model
{
    protected $table = 'frecuencias_horarias';
    public $timestamps = false;

    public function horarioDias(){
        return $this->hasMany('App\HorarioDia', 'foreign_key');
    }
}
