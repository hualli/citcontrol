<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrera extends Model
{
    use HasFactory;
    protected $table = "barreras";

    protected $fillable = [
        'nombre',
        'ubicacion',
        'provincia_id',
    ];

    //Relacion con Provincia
    public function provincia()
    {
        return $this->belongsTo('App\Models\Provincia');
    }

    // Relacion con Transito
    public function transitos()
    {
        return $this->hasMany('App\Models\Transito');
    }

    // Relacion con Guardia
    public function guardias()
    {
        return $this->hasMany('App\Models\Guardia');
    }
}
