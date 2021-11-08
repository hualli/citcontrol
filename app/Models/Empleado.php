<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = "empleados";

    protected $fillable = [
        'nombre',
        'apellido',
    ];

    //relacion muchos a muchos con guardia
    public function guardias()
    {
        return $this->belongsToMany('App\Models\Guardia', 'empleados_guardia', 'empleado_id', 'guardia_id');
    }
}
