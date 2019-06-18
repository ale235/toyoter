<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('razon_social');
            $table->string('telefono')->nullable();
            $table->string('cuit')->nullable();
            $table->string('iva')->nullable();
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();
            $table->string('calleynumero')->nullable();
            $table->string('codigopostal')->nullable();
            $table->string('logoempresa')->nullable();
            $table->boolean('vercosto')->nullable();
            $table->string('porcentaje')->nullable();
            $table->boolean('verdatostoyoter')->nullable();
            $table->string('chasis')->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
