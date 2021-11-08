<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;
use App\Models\Result;
use Carbon\Carbon;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ini_set('max_execution_time', 600); // 10 minutes

        $movimientos = Movement::all();
        //$vector = Movement::where('id', 0);
        $patente = [];
        $fecha = [];
        $distancia = [];
        $tiempo = [];
        $numeral = [];
        $velocidad = [];
        $rmb = [];
        $latitud = [];
        $longitud = [];
        $ubicacion = [];
        $ibutton = [];
        $chofer = [];
        $num_documento = [];
        $identificador = [];
        $inspector1 = [];
        $num_provincia = [];

        foreach ($movimientos as $movimiento) {
            array_push($patente, $movimiento->patente);
            array_push($fecha, $movimiento->fecha);
            array_push($distancia, $movimiento->distancia);
            array_push($numeral, $movimiento->numeral);
            array_push($velocidad, $movimiento->velocidad);
            array_push($rmb, $movimiento->rmb);
            array_push($latitud, $movimiento->latitud);
            array_push($longitud, $movimiento->longitud);
            array_push($ubicacion, $movimiento->ubicacion);
            array_push($ibutton, $movimiento->ibutton);
            array_push($chofer, $movimiento->chofer);
            array_push($num_documento, $movimiento->num_documento);
            array_push($identificador, $movimiento->identificador);
            array_push($inspector1, $movimiento->inspector1);
            array_push($num_provincia, $movimiento->num_provincia);

            if ($movimiento->distancia == 0) {
                array_push($tiempo, $movimiento->tiempo);
            } else {
                array_push($tiempo, "0");
            }
        }

        $suma = 0.00;
        $vector = [];
        $aux = [];
        foreach ($tiempo as $t) {
            if ($t == 0 && $suma == 0.00) {
                array_push($vector, 0);
            }
            if ($t != 0) {
                $suma = $suma + (float)$t;
                array_push($aux, $t);
            }
            /*if ($t != 0 && $suma != 0.00) {
                $suma = $suma + (float)$t;
                array_push($aux, $t);
            }*/
            if ($t == 0 && $suma != 0.00) {
                if ($suma > 0.25) {
                    foreach ($aux as $i => $value) {
                        array_push($vector, $aux[$i]);
                    }
                } else {
                    for ($j = 0; $j < sizeof($aux); $j++) {
                        array_push($vector, 0);
                    }
                }
                foreach ($aux as $i => $value) {
                    unset($aux[$i]);
                }
                $suma = 0.00;
                array_push($vector, 0);
            }
        }

        //dd($vector);
        //return 'Hello world';

        for ($i = 0; $i < sizeof($vector); $i++) {

            //$date = Carbon::parse($fecha[$i]);

            //$identeificador = $patente[$i] . $date->day . $date->month . $date->year . $date->format('H:i:s');

            $result = new Result;
            $result->patente = $patente[$i];
            $result->fecha = $fecha[$i];
            $result->distancia = $distancia[$i];
            $result->tiempo = $tiempo[$i];
            $result->numeral = $numeral[$i];
            $result->velocidad = $velocidad[$i];
            $result->rmb = $rmb[$i];
            $result->latitud = $latitud[$i];
            $result->longitud = $longitud[$i];
            $result->ubicacion = $ubicacion[$i];
            $result->ibutton = $ibutton[$i];
            $result->chofer = $chofer[$i];
            $result->num_documento = $num_documento[$i];
            $result->identificador = $identificador[$i];
            $result->inspector1 = $inspector1[$i];
            $result->num_provincia = $num_provincia[$i];
            $result->tiempo2 = $vector[$i];
            $result->save();

            unset($result);
        }

        return redirect()->route('principal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
