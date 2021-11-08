<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $table = "inspections";

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
        'barrerista',
    ];
}
