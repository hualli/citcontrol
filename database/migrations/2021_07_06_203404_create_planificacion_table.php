<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacion', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_ingreso');
            $table->dateTime('fecha_hora_egreso');
            $table->bigInteger('guardia_id')->unsigned();
            $table->timestamps();

            $table->foreign('guardia_id')
                ->references('id')
                ->on('guardia')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planificacion');
    }
}
