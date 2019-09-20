<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model {
    protected $table = 'tipos_usuarios';
    public $timestamps = false;

    public function usuarios(){
        return $this->hasMany('App\Usuario', 'foreign_key');
    }
}
