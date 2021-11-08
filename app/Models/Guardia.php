<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardia extends Model
{
    use HasFactory;
    protected $table = "guardia";

    protected $fillable = [
        'nombre',
        'barrera_id',
    ];

    //relacion muchos a muchos con empleados
    public function empleados()
    {
        return $this->belongsToMany('App\Models\Empleado', 'empleados_guardia', 'guardia_id', 'empleado_id');
    }

    //Relacion con Barrera
    public function barrera()
    {
        return $this->belongsTo('App\Models\Barrera');
    }

    // Relacion con Planificacion
    public function planificacions()
    {
        return $this->hasMany('App\Models\Planificacion');
    }
}
