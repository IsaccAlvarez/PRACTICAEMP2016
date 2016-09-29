<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('idContacto');
            $table->string('nombre');
            $table->boolean('esEmpresa');
            $table->string('nombreJuridico');
            $table->string('nombreRepresentante');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->string('emailCobro');
            $table->string('telCobro');
            $table->string('personaCobra');
            $table->string('tipoContacto');
            $table->string('estado');
            $table->integer('idUser')->unsigned();
            $table->integer('idUserUltimaModificacion');
            $table->timestamps();

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
        Schema::drop('contactos');
    }
}
