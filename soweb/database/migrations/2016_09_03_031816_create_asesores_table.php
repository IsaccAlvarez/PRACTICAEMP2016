<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesores', function (Blueprint $table) {
            $table->increments('idAsesor');
            $table->string('nombre');
            $table->string('iniciales');
            $table->string('telefono');
            $table->string('emailPersonal');
            $table->string('emailEmpresa');
            $table->string('estado');
            $table->Date('fechaIngreso');
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
        Schema::drop('asesores');
    }
}
