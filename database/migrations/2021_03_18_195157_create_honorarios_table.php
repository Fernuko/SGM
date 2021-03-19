<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honorarios', function (Blueprint $table) {
            $table->id();
            $table->double('monto_actor');
            $table->double('monto_demandado');
            $table->date('fecha_pago_actor')->nullable();
            $table->date('fecha_pago_demandado')->nullable();
            $table->boolean('beneficio_actor')->default(false);
            $table->boolean('beneficio_demandado')->default(false);

            $table->unsignedBigInteger('mediacion_id');
            $table->foreign('mediacion_id')->references('id')->on('mediaciones');

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
        Schema::dropIfExists('honorarios');
    }
}
