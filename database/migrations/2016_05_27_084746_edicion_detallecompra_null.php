<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EdicionDetallecompraNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detallecompras', function (Blueprint $table) {
            $table->integer('ubicacion_id')->nullable()->change();
            $table->date('fecha_caducidad')->nullable()->change();
            $table->boolean('entrega')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallecompras', function (Blueprint $table) {
            //
        });
    }
}
