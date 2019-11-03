<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $table = 'salones';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'capacidad',
        'id_sede',
        'id_subsede',
        'id_tipo_salon'
    ];

    public function sede()
    {
        return $this->belongsTo('App\Sede', 'id_sede');
    }

    public function subsede()
    {
        return $this->belongsTo('App\Subsede', 'id_subsede');
    }

    public function tipoSalon()
    {
        return $this->belongsTo('App\TipoSalon', 'id_tipo_salon');
    }

    public function horarios()
    {
        return $this->hasMany('App\HorarioDia', 'foreign_key');
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    public function scopeCapacidad($query, $capacidad)
    {
        if ($capacidad) {
            return $query->whereCapacidad($capacidad);
        }
    }
}
