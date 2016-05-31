<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteCamposMobiliarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            $table->dropColumn('idTipo');
            $table->dropColumn('idDistribuidor');
            $table->dropColumn('razon');
            $table->boolean('nuevo')->dafault(true);
            $table->integer('anios')->nullable();
            $table->string('factura',20);
            $table->integer('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            //
        });
    }
}
