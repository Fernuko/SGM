<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManejoDeFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manejo_de_fondos', function (Blueprint $table) {
            $table->id();
            $table->string("monto");
            $table->string("fecha");
            $table->timestamps();
             //Relaciones
             $table->unsignedBigInteger('persona_id');
             $table->foreign('persona_id')->references('id')->on('personas');
             $table->unsignedBigInteger('manejo_cuota_id');
             $table->foreign('manejo_cuota_id')->references('id')->on('manejo_cuotas');
             $table->unsignedBigInteger('manejo_forma_id');
             $table->foreign('manejo_forma_id')->references('id')->on('manejo_formas');
             $table->unsignedBigInteger('manejo_estado_id');
             $table->foreign('manejo_estado_id')->references('id')->on('manejo_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manejo_de_fondos');
    }
}
