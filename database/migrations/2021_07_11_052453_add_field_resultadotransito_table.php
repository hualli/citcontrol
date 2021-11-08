<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldResultadotransitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultadotransitos', function ($table) {
            $table->string('inspectores')->nullable();
            $table->bigInteger('guardia_id')->nullable();
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
            $table->dropColumn('inspectores');
            $table->dropColumn('guardia_id');
        });
    }
}
