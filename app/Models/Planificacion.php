<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    use HasFactory;
    protected $table = "planificacion";

    protected $fillable = [
        'fecha_hora_ingreso',
        'fecha_hora_egreso',
        'guardia_id',
    ];

    //Relacion con guardia
    public function guardia()
    {
        return $this->belongsTo('App\Models\Guardia');
    }
}
