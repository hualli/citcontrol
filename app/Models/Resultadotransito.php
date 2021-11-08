<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadotransito extends Model
{
    use HasFactory;
    protected $table = "resultadotransitos";

    protected $fillable = [
        'fecha',
        'rango_horario',
        'camara',
        'tipo',
        'sentido',
        'destino',
        'patente',
        'barrera',
        'ubicacion',
        'provincia',
        'guardia',
        'inspectores',
        'guardia_id',
        'barrera_id',
        'provincia_id',
    ];
}
