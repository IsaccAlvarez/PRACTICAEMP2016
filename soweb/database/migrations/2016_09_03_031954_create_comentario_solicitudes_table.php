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
            $table->integer('idAsesor')->unsigned();
            $table->dateTime('fechaCreacion');
            $table->string('comentario', 300);
            $table->timestamps();

            $table->foreign('idSolicitud')->references('idSolicitud')->on('solicitudes');
            $table->foreign('idAsesor')->references('idAsesor')->on('asesores');
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
