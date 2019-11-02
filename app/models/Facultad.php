<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_decano',
    ];
    public function decano()
    {
        return $this->belongsTo(User::class, 'id_decano');
    }

    public function programas()
    {
        return $this->hasMany('App\Programa', 'foreign_key');
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    public function scopeDecano($query, $decano)
    {
        if ($decano) {
            return $query->where('id_decano', $decano);
        }
    }
}
