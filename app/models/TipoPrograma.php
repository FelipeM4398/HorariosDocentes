<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model {
    protected $table = 'tipos_programas';
    public $timestamps = false;

    public function programas(){
        return $this->hasMany('App\Programa', 'foreign_key');
    }
}
