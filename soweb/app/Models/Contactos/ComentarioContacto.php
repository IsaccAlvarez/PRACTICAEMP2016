<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class ComentarioContacto extends Model
{
    protected $table = 'comentario_Contactos';
    protected $primaryKey = 'idComentario';
   protected $fillable = ['idContacto','idUser','comentario'];

    public function users(){
        return $this->belongsto('soweb\User', 'idUser');
    }

    public function contactos(){
        return $this->belongsto('soweb\Contactos', 'idContacto');
    }
}
