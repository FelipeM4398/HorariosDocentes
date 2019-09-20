<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model{
    protected $table = 'salones';
    public $timestamps = false;

    public function sede(){
        return $this->belongsTo('App\Sede', 'foreign_key', 'id_sede');
    }

    public function subsede(){
        return $this->belongsTo('App\Subsede', 'foreign_key', 'id_subsede');
    }

    public function tipoSalon(){
        return $this->belongsTo('App\TipoSalon', 'foreign_key', 'id_tipo_salon');
    }

    public function horarios(){
        return $this->hasMany('App\HorarioDia', 'foreign_key');
    }
}
