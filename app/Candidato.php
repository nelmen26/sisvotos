<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = [
        'nombre', 'apellidos', 'fotografia', 'estado', 'tipo_id', 'color',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }
    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] = strtoupper($value);
    }
    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'HABILITADO' : 'DESHABILITADO';
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function mesas()
    {
        return $this->belongsToMany(Mesa::class)
                    ->withPivot('votos')
                    ->withTimestamps();
    }

    public function scopeSearch($query, $buscar)
    {
        return $query->where('nombre','LIKE',"%$buscar%")
                    ->orWhere('apellidos','LIKE',"%$buscar%");
    }
}
