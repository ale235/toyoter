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
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('marca_vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precio_sugerido');
            $table->float('precio_minorista');
            $table->float('precio_mayorista');
            $table->float('precio_minorista_co');
            $table->float('precio_mayorista_co');
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

        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('repuesto_id');
            $table->foreign('repuesto_id')
                ->references('id')
                ->on('repuestos')
                ->onDelete('cascade');
            $table->string('ruta');
            $table->timestamps();
        });

        Schema::create('precios_historicos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precio_id');
            $table->float('repuesto_id');

            $table->foreign('precio_id')
                ->references('id')
                ->on('precios')
                ->onDelete('cascade');

            $table->foreign('repuesto_id')
                ->references('id')
                ->on('repuestos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('precios_historicos');
        Schema::dropIfExists('imagenes');
        Schema::dropIfExists('repuestos');
        Schema::dropIfExists('marca_repuestos');
        Schema::dropIfExists('marca_vehiculos');
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('precios');

    }
}
