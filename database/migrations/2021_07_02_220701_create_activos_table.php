<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('material_id');
            $table->foreign('material_id')->references('id')->on('materiales');
            $table->foreignId('entrada_id');
            $table->foreign('entrada_id')->references('id')->on('entradas');
            $table->foreignId('ubicacion_id');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');
            $table->string('observaciones');
            $table->decimal('costo',9,2);
            $table->string('numeroinventario')->unique();
            $table->string('numeroserie')->unique();
            $table->string('garantia');
            $table->string('status');
            
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
        Schema::dropIfExists('activos');
    }
}
