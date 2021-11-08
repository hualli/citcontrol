<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->nullable();
            $table->string('id_inspeccion')->nullable();
            $table->string('patente')->nullable();
            $table->string('tipo')->nullable();
            $table->string('cuve')->nullable();
            $table->string('tiene_doc')->nullable();
            $table->string('lleva_citricos_sin_doc')->nullable();
            $table->string('cumple_normativa')->nullable();
            $table->string('problemas')->nullable();
            $table->string('coincide_carga')->nullable();
            $table->string('num_acta')->nullable();
            $table->string('num_decomiso')->nullable();
            $table->string('num_dni')->nullable();
            $table->string('num_registro')->nullable();
            $table->string('estado')->nullable();
            $table->bigInteger('barrera_id')->nullable();
            $table->string('barrerista')->nullable();
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
        Schema::dropIfExists('inspections');
    }
}
