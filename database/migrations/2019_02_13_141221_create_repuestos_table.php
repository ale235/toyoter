<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_repuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::create('marca_vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::create('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precio_sugerido');
            $table->float('precio_minorista');
            $table->float('precio_mayorista');
            $table->float('precio_personalizado');
            $table->timestamps();
        });

        Schema::create('repuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->string('descripcion');
            $table->unsignedInteger('marca_repuesto_id');
            $table->unsignedInteger('marca_vehiculo_id');
            $table->unsignedInteger('seccion_id');
            $table->unsignedInteger('precio_id');
            $table->timestamps();

            $table->foreign('marca_repuesto_id')
                ->references('id')
                ->on('marca_repuestos')
                ->onDelete('cascade');

            $table->foreign('marca_vehiculo_id')
                ->references('id')
                ->on('marca_vehiculos')
                ->onDelete('cascade');

            $table->foreign('seccion_id')
                ->references('id')
                ->on('secciones')
                ->onDelete('cascade');

            $table->foreign('precio_id')
                ->references('id')
                ->on('precios')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repuestos');
        Schema::dropIfExists('marca_repuestos');
        Schema::dropIfExists('marca_vehiculos');
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('precios');

    }
}
