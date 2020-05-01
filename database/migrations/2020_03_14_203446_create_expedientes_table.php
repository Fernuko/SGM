<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string("caratula");
            $table->integer("numero");
            //Relaciones
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('personas');
            $table->unsignedBigInteger('demandado_id');
            $table->foreign('demandado_id')->references('id')->on('personas');
            $table->unsignedBigInteger('abogado_actor_id');
            $table->foreign('abogado_actor_id')->references('id')->on('abogados');
            $table->unsignedBigInteger('abogado_demandado_id');
            $table->foreign('abogado_demandado_id')->references('id')->on('abogados');
            $table->unsignedBigInteger('juzgado_id');
            $table->foreign('juzgado_id')->references('id')->on('juzgados');

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
        Schema::dropIfExists('expediente');
    }
}
