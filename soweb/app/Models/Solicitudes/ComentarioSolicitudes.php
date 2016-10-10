<?php

namespace soweb\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class ComentarioSolicitudes extends Model
{
    protected $table = 'comentario_solicitudes';
    protected $primaryKey = 'idComentario';
    protected $fillable = ['idSolicitud','idUser','comentario'];
    public function user(){
        return $this->hasMany(User::class);
    }

    public function solicitudes(){
        return $this->hasMany(Solicitudes::class);
    }
}
