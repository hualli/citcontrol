<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transito extends Model
{
    use HasFactory;
    protected $table = "transito";

    protected $fillable = [
        'fecha',
        'rango_horario',
        'camara',
        'tipo',
        'sentido',
        'destino',
        'patente',
        'barrera_id',
    ];

    //Relacion con Barrera
    public function barrera()
    {
        return $this->belongsTo('App\Models\Barrera');
    }
}
