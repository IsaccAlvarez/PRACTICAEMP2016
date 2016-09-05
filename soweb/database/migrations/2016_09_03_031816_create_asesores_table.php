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
            $table->string('tipoAsesor');
            $table->string('password');
            $table->dateTime('fechaCreacion');
            $table->string('telefono');
            $table->string('emailPersonal');
            $table->string('email')->unique();
            $table->string('estado');
            $table->dateTime('fechaUltimaModificacion');
            $table->integer('idAsesorUltimaModificacion');
            $table->rememberToken();
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
        Schema::drop('asesores');
    }
}