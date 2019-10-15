<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DisponibilidadDia extends Pivot
{
    protected $table = 'disponibilidades_dias';
    public $timestamps = false;
}
