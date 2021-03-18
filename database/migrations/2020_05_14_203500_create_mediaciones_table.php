<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediaciones', function (Blueprint $table) {
            $table->id();
            $table->string("numero");
            $table->string("observaciones");
            $table->dateTime('fecha')->nullable();
            $table->string('archivo')->nullable();
            //Relaciones
            $table->unsignedBigInteger('expediente_id');
            $table->foreign('expediente_id')->references('id')->on('expedientes');
            $table->unsignedBigInteger('tipo_cierre_id');
            $table->foreign('tipo_cierre_id')->references('id')->on('tipo_cierres');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

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
        Schema::dropIfExists('mediacion');
    }
}
