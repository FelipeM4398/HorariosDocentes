<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';
    public $timestamps = false;

    public function tipoPrograma()
    {
        return $this->belongsTo('App\TipoPrograma', 'foreign_key', 'id_tipo_programa');
    }

    public function facultad()
    {
        return $this->belongsTo('App\Facultad', 'foreign_key', 'id_facultad');
    }

    public function director()
    {
        return $this->belongsTo('App\Usuario', 'id_director');
    }

    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad', 'foreign_key', 'id_modalidad');
    }
}
