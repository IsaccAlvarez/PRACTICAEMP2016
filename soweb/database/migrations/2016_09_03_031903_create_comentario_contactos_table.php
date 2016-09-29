<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_contactos', function (Blueprint $table) {
            $table->increments('idComentario');
            $table->integer('idContacto')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('comentario', 300);
            $table->timestamps();

            $table->foreign('idContacto')->references('idContacto')->on('contactos');
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
        Schema::drop('comentario_contactos');
    }
}
