<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',5);
            $table->unsignedBigInteger('tipoTramite');
            $table->date('fechaRegistro');
            $table->unsignedBigInteger('estado');
            $table->text('razon');
            $table->unsignedBigInteger('usuarioRegistro');
            $table->text('observacion');
            $table->timestamps();

            $table->foreign('estado')->references('id')->on('estado_tramites');
            $table->foreign('tipoTramite')->references('id')->on('tipo_tramites');
            $table->foreign('usuarioRegistro')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}
