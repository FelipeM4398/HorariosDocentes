<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornadas';
    public $timestamps = false;

    public function disponibilidadDocente()
    {
        return $this->belongsToMany('App\DisponibilidadDocente', 'disponibilidades_dias', 'id_jornada', 'id_dispo')
            ->withPivot([
                'disponible'
            ]);
    }

    public function dias()
    {
        return $this->belongsToMany('App\Dia', 'disponibilidades_dias', 'id_jornada', 'id_dia')
            ->withPivot([
                'disponible'
            ]);
    }

    public function getHoraInicioAttribute($value)
    {
        $time = Carbon::createFromFormat('H:i:s', $value);
        return $time->format('h:i a');
    }

    public function getHoraFinAttribute($value)
    {
        $time = Carbon::createFromFormat('H:i:s', $value);
        return $time->format('h:i a');
    }
}
