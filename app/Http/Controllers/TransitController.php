<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultadotransito;
use Illuminate\Support\Facades\DB;

class TransitController extends Controller
{
    public function index()
    {
        ini_set('max_execution_time', 1200); // 20 minutes




        $barreras = DB::table('barreras')
            ->join('provincias', 'provincias.id', '=', 'barreras.provincia_id')
            ->join('transito', 'transito.barrera_id', '=', 'barreras.id')
            ->select(
                'barreras.nombre as barrera',
                'barreras.ubicacion as ubicacion',
                'provincias.nombre as provincia',
                'provincias.id as provincia_id',
                'barreras.id as barrera_id',
                'transito.fecha as fecha',
                'transito.rango_horario as rango_horario',
                'transito.camara as camara',
                'transito.tipo as tipo',
                'transito.sentido as sentido',
                'transito.destino as destino',
                'transito.patente as patente',
            )
            ->get();

        $inspectores = DB::table('empleados_guardia')
            ->join('empleados', 'empleados.id', '=', 'empleados_guardia.empleado_id')
            ->join('guardia', 'guardia.id', '=', 'empleados_guardia.guardia_id')
            ->select(
                'guardia.nombre as guardia',
                'guardia.id as guardia_id',
                'empleados.nombre as nombre_inspector',
                'empleados.apellido as apellido_inspector',
            )->get();

        //dd($inspectores);


        $guardias = DB::table('guardia')
            ->join('planificacion', 'planificacion.guardia_id', '=', 'guardia.id')
            ->select(
                'guardia.id as guardia_id',
                'guardia.nombre as guardia',
                'guardia.barrera_id as barrera_id',
                'planificacion.fecha_hora_ingreso as fecha_hora_ingreso',
                'planificacion.fecha_hora_egreso as fecha_hora_egreso',
            )
            ->get();




        foreach ($barreras as $b) {
            $resultado = new Resultadotransito;
            $resultado->fecha = $b->fecha;
            $resultado->rango_horario = $b->rango_horario;
            $resultado->camara = $b->camara;
            $resultado->tipo = $b->tipo;
            $resultado->sentido = $b->sentido;
            $resultado->destino = $b->destino;
            $resultado->patente = $b->patente;
            $resultado->barrera = $b->barrera;
            $resultado->barrera_id = $b->barrera_id;
            $resultado->ubicacion = $b->ubicacion;
            $resultado->provincia = $b->provincia;
            $resultado->provincia_id = $b->provincia_id;

            foreach ($guardias as $g) {
                if (($b->fecha >= $g->fecha_hora_ingreso) && ($b->fecha <= $g->fecha_hora_egreso) && ($b->barrera_id == $g->barrera_id)) {
                    $resultado->guardia_id = $g->guardia_id;
                    $resultado->guardia = $g->guardia;
                }
            }

            $inspec = '';
            $inspec_nombre = '';
            $inspec_apellido = '';

            foreach ($inspectores as $inspector) {
                if ($resultado->guardia_id == $inspector->guardia_id) {
                    $inspec_nombre = $inspector->nombre_inspector;
                    $inspec_apellido = $inspector->apellido_inspector;
                    $inspec = $inspec . $inspec_apellido . ' ' . $inspec_nombre . ' - ';
                }
            }

            $resultado->inspectores = $inspec;

            $resultado->save();
            unset($resultado);
        }

        return redirect()->route('principal');
    }
}
