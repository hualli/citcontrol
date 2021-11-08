<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movement', function (Blueprint $table) {
            $table->string('numeral')->nullable()->after('patente');
            $table->string('velocidad')->nullable()->after('fecha');
            $table->string('rmb')->nullable()->after('velocidad');
            $table->string('latitud')->nullable()->after('rmb');
            $table->string('longitud')->nullable()->after('latitud');
            $table->string('ubicacion')->nullable()->after('longitud');
            $table->string('ibutton')->nullable()->after('ubicacion');
            $table->string('chofer')->nullable()->after('ibutton');
            $table->string('num_documento')->nullable()->after('chofer');
            $table->string('identificador')->nullable()->after('distancia');
            $table->string('inspector1')->nullable()->after('identificador');
            $table->string('num_provincia')->nullable()->after('tiempo');
            $table->string('vacio1')->nullable()->after('num_provincia');
            $table->string('vacio2')->nullable()->after('vacio1');
            $table->string('vacio3')->nullable()->after('vacio2');
            $table->string('vacio4')->nullable()->after('vacio3');
            $table->string('inspector2')->nullable()->after('vacio4');
            $table->string('provincia')->nullable()->after('inspector2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movement', function ($table) {
            $table->dropColumn('numeral');
            $table->dropColumn('velocidad');
            $table->dropColumn('rmb');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
            $table->dropColumn('ubicacion');
            $table->dropColumn('ibutton');
            $table->dropColumn('chofer');
            $table->dropColumn('num_documento');
            $table->dropColumn('identificador');
            $table->dropColumn('inspector1');
            $table->dropColumn('num_provincia');
            $table->dropColumn('vacio1');
            $table->dropColumn('vacio2');
            $table->dropColumn('vacio3');
            $table->dropColumn('vacio4');
            $table->dropColumn('inspector2');
            $table->dropColumn('provincia');
        });
    }
}
