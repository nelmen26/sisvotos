<?php

namespace SIS;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $fillable = [
        'nombre', 'recinto_id', 'total_votar', 'estado', 'tipo',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'ABIERTO' : 'CERRADO';
    }

    public function recinto()
    {
        return $this->belongsTo(Recinto::class);
    }

    public function candidatos()
    {
        return $this->belongsToMany(Candidato::class)
                    ->withPivot('votos')
                    ->withTimestamps();
    }
}
