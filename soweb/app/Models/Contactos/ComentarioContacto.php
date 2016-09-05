<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class ComentarioContacto extends Model
{
    protected $table = 'comentarioContactos';
    protected $primaryKey = 'idComentario';

    public function asesores(){
        return $this->hasMany(Aseseros::class);
    }

    public function contactos(){
        return $this->hasMany(Contactos::class);
    }
}
