<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDetalle extends Model
{
    protected $table = 'horarios_detalles';
    public $timestamps = false;
    public $fillable = ['id_docente', 'id_asignatura', 'id_periodo'];

    public function docente()
    {
        return $this->belongsTo('App\Usuario', 'id_docente');
    }

    public function periodo()
    {
        return $this->belongsTo('App\PeriodoAcademico', 'id_periodo');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura', 'id_asignatura');
    }

    public function horarioDia()
    {
        return $this->hasMany('App\HorarioDia', 'id_horario_detalle');
    }

    public function grupos()
    {
        return $this->belongsToMany('App\Grupo', 'grupos_horarios', 'id_horario_detalle', 'id_grupo')
            ->as('grupos_horarios')
            ->withPivot('cantidad_estudiantes');
    }

    public function scopePeriodoo($query, $id)
    {
        if ($id) {
            return $query->where('id_periodo', '=', $id);
        }
    }

    public function scopeDocentee($query, $id)
    {
        if ($id) {
            return $query->where('id_docente', '=', $id);
        }
    }

    public function scopeAsignaturaa($query, $id)
    {
        if ($id) {
            return $query->where('id_asignatura', '=', $id);
        }
    }

    public function scopeSalon($query, $salon)
    {
        if ($salon) {
            return $query->whereNotNull('horarios_dias.id_salon');
        }
    }
}
