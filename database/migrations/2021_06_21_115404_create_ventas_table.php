<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');
            $table->char('venta_estado',1);
            $table->string('vent_celular');
            $table->string('vent_direccion');
            $table->double('vent_latitud');
            $table->double('vent_longitud');
            $table->timestamp('vent_fecha')->useCurrent();
            $table->integer('vent_cant_productos');
            $table->integer('vent_precio');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
