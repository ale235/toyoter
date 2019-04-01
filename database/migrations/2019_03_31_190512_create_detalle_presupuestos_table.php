<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_presupuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('presupuesto_id');
            $table->foreign('presupuesto_id')
                ->references('id')
                ->on('presupuestos')
                ->onDelete('cascade');
            $table->string('codigo');
            $table->integer('cantidad');
            $table->float('precio_sugerido');
            $table->float('precio_venta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_presupuestos');
    }
}
