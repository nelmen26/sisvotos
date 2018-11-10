<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'estado',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = strtoupper($value);
    }

    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'HABILITADO' : 'DESHABILITADO';
    }

    public function mesas()
    {
        return $this->hasMany(Mesa::class);
    }
}
