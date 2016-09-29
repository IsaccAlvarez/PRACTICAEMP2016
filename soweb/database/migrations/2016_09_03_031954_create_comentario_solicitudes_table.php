<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_solicitudes', function (Blueprint $table) {
            $table->increments('idComentario');
            $table->integer('idSolicitud')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('comentario', 300);
            $table->timestamps();

            $table->foreign('idSolicitud')->references('idSolicitud')->on('solicitudes');
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentario_solicitudes');
    }
}
