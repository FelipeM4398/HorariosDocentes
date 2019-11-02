<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSede extends Model
{
    protected $table = 'subsedes';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'direccion'
    ];

    public function salones()
    {
        return $this->hasMany('App\Salon', 'foreign_key');
    }
}
