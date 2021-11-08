<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadoinspection extends Model
{
    use HasFactory;
    protected $table = "resultadoinspections";

    protected $fillable = [
        'fecha',
        'id_inspeccion',
        'patente',
        'tipo',
        'cuve',
        'tiene_doc',
        'lleva_citricos_sin_doc',
        'cumple_normativa',
        'problemas',
        'coincide_carga',
        'num_acta',
        'num_decomiso',
        'num_dni',
        'num_registro',
        'estado',
        'barrera_id',
        'barrera',
        'barrerista',
        'nombre_guardia',
        'guardia_id',
        'provincia_id',
        'provincia',
    ];
}
