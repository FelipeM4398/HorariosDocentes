<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'nombre',
        'creditos'
    ];

    public function docentes()
    {
        return $this->belongsToMany('App\Usuario', 'docentes_asignaturas', 'id_asignatura', 'id_docente');
    }

    public function horario()
    {
        return $this->hasMany('App/HorarioDetalle', 'foreign_key');
    }

    public function horarioCompartido()
    {
        return $this->belongsToMany('App\HorarioDetalle')->as('asignaturas_compartidas');
    }
}
