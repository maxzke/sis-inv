<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreignId('puesto_id');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->integer('numero')->unique();
            $table->string('nombre')->unique();
            $table->foreignId('campu_id');
            $table->foreign('campu_id')->references('id')->on('campus');

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
        Schema::dropIfExists('empleados');
    }
}
