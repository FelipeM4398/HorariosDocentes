<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    public function tipoUsuario()
    {
        return $this->belongsTo('App\TipoUsuario', 'id_tipo_usuario');
    }

    public function tipoContrato()
    {
        return $this->belongsTo('App\TipoContrato', 'foreign_key', 'id_tipo_contrato');
    }

    public function facultad()
    {
        return $this->hasMany('App\Facultad', 'foreign_key');
    }

    public function programa()
    {
        return $this->hasMany('App\Facultad', 'foreign_key');
    }

    public function asignaturas()
    {
        return $this->belongsToMany('App\Asignatura')->as('docentes_asignaturas');
    }

    public function disponibilidad()
    {
        return $this->hasMany('App\DisponibilidadDocente', 'foreign_key');
    }

    public function horario()
    {
        return $this->hasMany('App/HorarioDetalle', 'foreign_key');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    protected $fillable = ['identificacion', 'nombres', 'apellidos', 'telefono', 'email', 'verificado', 'password', 'id_tipo_usuario', 'id_tipo_contrato'];
}
