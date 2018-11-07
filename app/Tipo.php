<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'estado',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? "HABILITADO" : "DESHABILITADO" ;
    }
}
