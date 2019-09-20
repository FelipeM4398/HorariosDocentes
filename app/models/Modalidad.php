<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model{
    protected $table = 'modalidades';
    public $timestamps = false;

    public function programas(){
        return $this->hasMany('App\Programa', 'foreign_key');
    }
}
