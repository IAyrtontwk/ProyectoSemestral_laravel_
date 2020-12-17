<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilCongresista extends Model
{
    use HasFactory;
    protected $fillable = [
        'camara',
        'nombre',
        'apellidos',
        'territorio',
        'numTerritorio',
        'partido',
        'email',
    ];
}
