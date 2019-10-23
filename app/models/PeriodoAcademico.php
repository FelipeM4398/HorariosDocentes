<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    protected $table = 'periodos_academicos';
    public $timestamps = false;
    protected $fillable = [
        'año',
        'periodo'
    ];

}
