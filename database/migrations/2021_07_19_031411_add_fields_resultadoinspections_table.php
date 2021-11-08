<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsResultadoinspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultadoinspections', function ($table) {
            $table->string('guardia_id')->nullable();
            $table->string('provincia_id')->nullable();
            $table->string('provincia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultadoinspections', function ($table) {
            $table->dropColumn('guardia_id');
            $table->dropColumn('provincia_id');
            $table->dropColumn('provincia');
        });
    }
}
