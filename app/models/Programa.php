<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model {
    protected $table = 'programas';
    protected $fillable = [
      'snies',
      'nombre',
      'descripcion',
      'duracion',
      'id_director',
      'id_modalidad',
      'id_facultad',
      'id_tipo_programa',
    ];
    public $timestamps = false;

    public function tipoPrograma(){
        return $this->belongsTo(TipoPrograma::class, 'id_tipo_programa');
    }

    public function facultad(){
        return $this->belongsTo(Facultad::class, 'id_facultad');
    }

    public function director(){
        return $this->belongsTo(User::class,'id_director');
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }
}
