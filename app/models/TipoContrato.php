<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model {
    protected $table = 'tipos_contratos';
    public $timestamps = false;

    public function docentes(){
        return $this->hasMany('App\Usuario', 'foreign_key');
    }
}
