<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFieldEmpleadoidGuardiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardia', function ($table) {
            $table->dropForeign('guardia_empleado_id_foreign');
            $table->dropColumn('empleado_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardia', function ($table) {
            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }
}
