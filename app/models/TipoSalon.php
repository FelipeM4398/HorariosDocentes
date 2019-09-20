<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSalon extends Model {
    protected $table = 'tipos_salones';
    public $timestamps = false;

    public function salones(){
        return $this->hasMany('App\Salon', 'foreign_key');
    }
}
