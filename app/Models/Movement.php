<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;
    protected $table = "movement";

    protected $fillable = [
        'patente',
        'fecha',
        'distancia',
        'tiempo',
        'numeral',
        'velocidad',
        'rmb',
        'latitud',
        'longitud',
        'ubicacion',
        'ibutton',
        'chofer',
        'num_documento',
        'identificador',
        'inspector1',
        'num_provincia',
    ];
}
