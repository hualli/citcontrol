<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsResultadotransitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultadotransitos', function ($table) {
            $table->string('barrera_id')->nullable();
            $table->string('provincia_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultadotransitos', function ($table) {
            $table->dropColumn('barrera_id');
            $table->dropColumn('provincia_id');
        });
    }
}
