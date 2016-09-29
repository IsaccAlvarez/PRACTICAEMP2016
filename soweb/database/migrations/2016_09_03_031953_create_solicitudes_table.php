<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('idSolicitud');
            $table->date('fecha');
            $table->integer('idContacto')->unsigned();
            $table->integer('idAsesor')->unsigned();
            $table->integer('idUserUltimaModificacion')->unsigned();
            $table->string('estado');
            $table->dateTime('fechaCerrado');
            $table->string('tipoSolicitud');
            $table->decimal('precioCotizacion');
            $table->decimal('precioCobrado');
            $table->timestamps();

            $table->foreign('idContacto')->references('idContacto')->on('contactos');
            $table->foreign('idAsesor')->references('idAsesor')->on('asesores');
            $table->foreign('idUserUltimaModificacion')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicitudes');
    }
}
