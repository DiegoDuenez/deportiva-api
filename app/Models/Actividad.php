<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'actividades';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function actividadesPersonas()
    {
        return $this->belongsToMany(Persona::class);
    }
}
