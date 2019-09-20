<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsede extends Model {
    protected $table = 'subsedes';
    public $timestamps = false;

    public function salones(){
        return $this->hasMany('App\Salon', 'foreign_key');
    }
}
