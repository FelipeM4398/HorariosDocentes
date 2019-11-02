<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'direccion',
    ];

    public function grupos()
    {
        return $this->hasMany('App\Grupo', 'foreign_key');
    }

    public function salones()
    {
        return $this->hasMany('App\Salon', 'foreign_key');
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    public function scopeDireccion($query, $direccion)
    {
        if ($direccion) {
            return $query->where('direccion', 'LIKE', "%$direccion%");
        }
    }
}
