<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_prod');
            $table->decimal('precio', 5, 2);
            $table->decimal('discount', 5, 2)->nullable()->default(0.00);
            $table->integer('cantidad');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas');
            $table->foreign('id_prod')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
