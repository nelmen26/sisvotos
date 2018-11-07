<?php

namespace SIS;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'nombre', 'nickname', 'password', 'rol'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    //Metodo para Encriptar el password de un usuario
    public function setPasswordAttribute($valor)
    {
        if(!empty($valor))
            $this->attributes['password'] = \Hash::make($valor);
    }
}
