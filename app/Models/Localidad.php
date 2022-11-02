<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'localidades';

    protected $fillable = [
        'tipo'
    ];
    
}
