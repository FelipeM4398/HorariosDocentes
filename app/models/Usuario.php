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

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort("401", "No tienes permisos para realizar esta acción.");
    }

    public function hasAnyRole($roles)
    {
        if (\is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->tipoUsuario()->where('nombre', '=', $role)->first()) {
            return true;
        }
        return false;
    }

    public function tipoUsuario()
    {
        return $this->belongsTo('App\TipoUsuario', 'id_tipo_usuario');
    }

    public function tipoContrato()
    {
        return $this->belongsTo('App\TipoContrato', 'id_tipo_contrato');
    }

    public function facultad()
    {
        return $this->hasMany('App\Facultad', 'id_decano');
    }

    public function programa()
    {
        return $this->hasMany('App\Programa', 'id_director');
    }

    public function asignaturas()
    {
        return $this->belongsToMany('App\Asignatura', 'docentes_asignaturas', 'id_docente', 'id_asignatura')->as('docentes_asignaturas');
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

    protected $hidden = ['password', 'remember_token'];

    public function scopeIdentificacion($query, $identificacion)
    {
        if ($identificacion) {
            return $query->where('identificacion', 'LIKE', "$identificacion%");
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombres', 'LIKE', "%$nombre%");
        }
    }

    public function scopeApellido($query, $apellido)
    {
        if ($apellido) {
            return $query->where('apellidos', 'LIKE', "%$apellido%");
        }
    }

    public function scopeRol($query, $rol)
    {
        if ($rol) {
            if ($rol == "6") {
                return $query->whereNull('id_tipo_usuario');
            }
            return $query->where('id_tipo_usuario', '=', "$rol");
        }
    }
}
