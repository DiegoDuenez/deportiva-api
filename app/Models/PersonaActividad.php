<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaActividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        'actividad_id',
        'pado_id',
    ];

}
