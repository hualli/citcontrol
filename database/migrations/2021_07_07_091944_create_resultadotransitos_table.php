<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadotransitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultadotransitos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('rango_horario');
            $table->string('camara');
            $table->string('tipo');
            $table->string('sentido');
            $table->string('destino');
            $table->string('patente');
            $table->string('barrera');
            $table->string('ubicacion');
            $table->string('provincia');
            $table->string('guardia');
            $table->string('inspectores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultadotransitos');
    }
}
