<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'apellidos',
        'curp',
        'localidad_id',
        'folio_id'

    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id');
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class, 'folio_id');
    }


    public function personasActividades()
    {
        $this->belongsToMany(Actividad::class);
    }

}
