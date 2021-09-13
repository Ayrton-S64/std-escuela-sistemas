<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacionesTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('operaciones_tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite');
            $table->string('detalle');
            $table->unsignedBigInteger('usuarioOrigen');
            $table->text('rolOrigen');
            $table->unsignedBigInteger('usuarioDestino');
            $table->text('rolDestino');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->timestamps();

            $table->foreign('tramite')->references('id')->on('tramites');

            $table->foreign('usuarioOrigen')->references('id')->on('users');
            $table->foreign('usuarioDestino')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operaciones_tramites');
    }
}
