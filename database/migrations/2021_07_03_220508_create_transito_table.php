<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transito', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('rango_horario');
            $table->string('camara');
            $table->string('tipo');
            $table->string('sentido');
            $table->string('destino');
            $table->string('patente');
            $table->bigInteger('barrera_id')->unsigned();
            $table->timestamps();

            $table->foreign('barrera_id')
                ->references('id')
                ->on('barreras')
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
        Schema::dropIfExists('transito');
    }
}
