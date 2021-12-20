<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTramite');
            $table->string('ruta');
            $table->string('nombreArchivo');
            $table->boolean('administrativo')->default(false);
            $table->timestamps();

            $table->foreign('idTramite')->references('id')->on('tramites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_tramites');
    }
}
