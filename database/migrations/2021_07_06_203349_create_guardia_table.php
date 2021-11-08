<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('barrera_id')->unsigned();
            $table->timestamps();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('guardia');
    }
}
