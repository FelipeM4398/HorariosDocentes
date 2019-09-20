<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JornadaAcademica extends Model {
    protected $table = 'jornadas_academicas';
    public $timestamps = false;

    public function grupos(){
        return $this->hasMany('App\Grupo', 'foreign_key');
    }
}
