<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HorarioDia extends Model
{
    protected $table = 'horarios_dias';
    public $timestamps = false;
    public $fillable = ['id_dia', 'id_frecuencia', 'id_salon', 'hora', 'cantidad_horas'];

    public function dia()
    {
        return $this->belongsTo('App\Dia', 'id_dia');
    }

    public function salon()
    {
        return $this->belongsTo('App\Salon', 'id_salon');
    }

    public function frecuencia()
    {
        return $this->belongsTo('App\FrecuenciaHoraria', 'id_frecuencia');
    }

    public function horarioDetalle()
    {
        return $this->belongsTo('App\HorarioDetalle', 'id_horario_detalle');
    }

    public function horaFin()
    {
        $hora_inicio = Carbon::createFromFormat('H:i:s', $this->hora);
        $minutes = $this->cantidad_horas * 60;
        return $hora_inicio->addMinutes($minutes)->format('h:i a');
    }

    public function horaInicio()
    {
        $time = Carbon::createFromFormat('H:i:s', $this->hora);
        return $time->format('h:i a');
    }

    public function scopeDiaa($query, $id)
    {
        if ($id) {
            return $query->where('id_dia', $id);
        }
    }

    public function scopeHora($query, $hora)
    {
        if ($hora) {
            return $query->where('hora', $hora);
        }
    }

    public function scopeAsignar($query, $asig)
    {
        if ($asig) {
            return $query->whereNull('id_salon');
        }
    }
}
