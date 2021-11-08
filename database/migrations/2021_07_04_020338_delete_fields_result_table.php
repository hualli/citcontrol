<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFieldsResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function ($table) {
            $table->dropColumn('vacio1');
            $table->dropColumn('vacio2');
            $table->dropColumn('vacio3');
            $table->dropColumn('vacio4');
            $table->dropColumn('inspector2');
            $table->dropColumn('provincia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('result', function ($table) {
            $table->string('vacio1')->nullable()->after('num_provincia');
            $table->string('vacio2')->nullable()->after('vacio1');
            $table->string('vacio3')->nullable()->after('vacio2');
            $table->string('vacio4')->nullable()->after('vacio3');
            $table->string('inspector2')->nullable()->after('vacio4');
            $table->string('provincia')->nullable()->after('inspector2');
        });
    }
}
