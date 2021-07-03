<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('folio')->unique();
            $table->string('requisicion');
            $table->string('tipo_compra',30);
            /**
             * tipo_compra
            *-Select Option-
            *-Directa
            *-Licitación
            *-Consolidada
            *-Donación
            *-Promoción
            *-Otra
             */
            $table->string('fecha');
            /**
             * Fecha escrita en la factura
             */
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
        Schema::dropIfExists('entradas');
    }
}
