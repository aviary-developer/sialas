<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agregarreparaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
            //

          $table->boolean('credito')->default(false);
          //Definir el monto de interes aplicado
          $table->double('interes')->nullable();
          //Definir la cantidad de cuotas a cancelar
          $table->integer('num_cuotas')->nullable();
          //Definir el valor de la cuota a cancelar
          $table->double('val_cuotas')->nullable();
          //Definir el tiempo de pagination
          $table->integer('tiempo_pago')->nullable();
          /*
          0 - Diario, 1 - Semanal, 2 - Quincenal
          3 - Mensual, 4 - Bimensual, 5 - Trimestral
          6 - Catrimestral, 7 - Semestral, 8 - Anual
          */
          //Numero de cuenta del bien
          $table->string('cuenta',15)->nullable();
          //Define el día en que se va a pagar la cuota, [1-31]
          $table->integer('dia_pago')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
            //
        });
    }
}
