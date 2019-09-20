<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model {
    protected $table = 'sedes';
    public $timestamps = false;

    public function grupos(){
        return $this->hasMany('App\Grupo', 'foreign_key');
    }

    public function salones(){
        return $this->hasMany('App\Salon', 'foreign_key');
    }
}
