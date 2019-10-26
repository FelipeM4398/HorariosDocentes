<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_jornada_academica',
        'id_sede',
        'id_programa',
    ];

    public function programa()
    {
        return $this->belongsTo('App\Programa', 'id_programa');
    }

    public function jornadaAcademica()
    {
        return $this->belongsTo('App\JornadaAcademica', 'id_jornada_academica');
    }

    public function sede()
    {
        return $this->belongsTo('App\Sede', 'id_sede');
    }

    public function horarios()
    {
        return $this->belongsToMany('App\HorarioDetalle')
            ->as('grupos_horarios')
            ->withPivot('cantidad_estudiantes');
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    public function scopePrograma($query, $id)
    {
        if ($id) {
            return $query->where('id_programa', '=', $id);
        }
    }

    public function scopeJornada($query, $id)
    {
        if ($id) {
            return $query->where('id_jornada_academica', '=', $id);
        }
    }

    public function scopeSede($query, $id)
    {
        if ($id) {
            return $query->where('id_sede', '=', $id);
        }
    }
}
