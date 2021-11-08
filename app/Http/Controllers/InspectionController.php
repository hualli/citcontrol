<?php

namespace App\Http\Controllers;

use App\Models\Barrera;
use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Guardia;
use App\Models\Provincia;
use App\Models\Resultadoinspection;
use Illuminate\Support\Facades\DB;

class InspectionController extends Controller
{
    public function index()
    {
        ini_set('max_execution_time', 600); // 10 minutes

        //$inspection = Inspection::get();

        $inspection = DB::table('inspections')
            ->join('barreras', 'barreras.id', '=', 'inspections.barrera_id')
            ->select(
                'inspections.fecha as fecha',
                'inspections.id_inspeccion as id_inspeccion',
                'inspections.patente as patente',
                'inspections.tipo as tipo',
                'inspections.cuve as cuve',
                'inspections.tiene_doc as tiene_doc',
                'inspections.lleva_citricos_sin_doc as lleva_citricos_sin_doc',
                'inspections.cumple_normativa as cumple_normativa',
                'inspections.problemas as problemas',
                'inspections.coincide_carga as coincide_carga',
                'inspections.num_acta as num_acta',
                'inspections.num_decomiso as num_decomiso',
                'inspections.num_dni as num_dni',
                'inspections.num_registro as num_registro',
                'inspections.estado as estado',
                'inspections.barrera_id as barrera_id',
                'inspections.barrerista as barrerista',
                'barreras.nombre as barrera',
                'barreras.provincia_id as provincia_id',
            )
            ->get();

        $guardias = DB::table('guardia')
            ->join('planificacion', 'planificacion.guardia_id', '=', 'guardia.id')
            ->select(
                'guardia.nombre as guardia',
                'guardia.id as guardia_id',
                'guardia.barrera_id as barrera_id',
                'planificacion.fecha_hora_ingreso as fecha_hora_ingreso',
                'planificacion.fecha_hora_egreso as fecha_hora_egreso',
            )
            ->get();

        $provincias = Provincia::get();

        foreach ($inspection as $ins) {
            $resultado = new Resultadoinspection;

            $resultado->fecha = $ins->fecha;
            $resultado->id_inspeccion = $ins->id_inspeccion;
            $resultado->patente = $ins->patente;
            $resultado->tipo = $ins->tipo;
            $resultado->cuve = $ins->cuve;
            $resultado->tiene_doc = $ins->tiene_doc;
            $resultado->lleva_citricos_sin_doc = $ins->lleva_citricos_sin_doc;
            $resultado->cumple_normativa = $ins->cumple_normativa;
            $resultado->problemas = $ins->problemas;
            $resultado->coincide_carga = $ins->coincide_carga;
            $resultado->num_acta = $ins->num_acta;
            $resultado->num_decomiso = $ins->num_decomiso;
            $resultado->num_dni = $ins->num_dni;
            $resultado->num_registro = $ins->num_registro;
            $resultado->estado = $ins->estado;
            $resultado->barrerista = $ins->barrerista;
            $resultado->barrera_id = $ins->barrera_id;
            $resultado->barrera = $ins->barrera;
            $resultado->provincia_id = $ins->provincia_id;

            foreach ($guardias as $g) {
                if (($ins->fecha >= $g->fecha_hora_ingreso) && ($ins->fecha <= $g->fecha_hora_egreso) && ($ins->barrera_id == $g->barrera_id)) {
                    $resultado->nombre_guardia = $g->guardia;
                    $resultado->guardia_id = $g->guardia_id;
                }
            }

            foreach ($provincias as $p) {
                if ($ins->provincia_id == $p->id) {
                    $resultado->provincia_id = $p->id;
                    $resultado->provincia = $p->nombre;
                }
            }

            $resultado->save();
            unset($resultado);
        }
        return redirect()->route('principal');
    }
}
