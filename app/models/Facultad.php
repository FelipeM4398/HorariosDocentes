<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';
    public $timestamps = false;

    public function decano()
    {
        return $this->belongsTo('App\Usuario', 'id_decano');
    }

    public function programas()
    {
        return $this->hasMany('App\Programa', 'foreign_key');
    }
}
