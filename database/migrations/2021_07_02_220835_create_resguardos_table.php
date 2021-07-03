<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResguardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resguardos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('activo_id');
            $table->foreign('activo_id')->references('id')->on('activos');
            $table->foreignId('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');

            $table->foreignId('campu_id');
            $table->foreign('campu_id')->references('id')->on('campus');
            $table->foreignId('ubicacione_id');
            $table->foreign('ubicacione_id')->references('id')->on('ubicaciones');

            $table->enum('status',['asignado','devuelto'])->nullable()->default('asignado');
            
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
        Schema::dropIfExists('resguardos');
    }
}
