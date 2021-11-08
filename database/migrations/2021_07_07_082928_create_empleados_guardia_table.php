<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_guardia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('guardia_id')->unsigned();
            $table->timestamps();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('empleados_guardia');
    }
}
