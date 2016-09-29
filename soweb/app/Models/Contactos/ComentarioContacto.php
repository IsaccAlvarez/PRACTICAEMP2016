<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class ComentarioContacto extends Model
{
    protected $table = 'comentario_Contactos';
    protected $primaryKey = 'idComentario';
   protected $fillable = ['idContacto','idUser','comentario'];
    public function user(){
        return $this->hasMany(User::class);
    }

    public function contactos(){
        return $this->hasMany(Contactos::class);
    }
}
