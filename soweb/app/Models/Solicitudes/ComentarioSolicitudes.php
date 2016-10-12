<?php

namespace soweb\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;
use soweb\User;
use soweb\Models\Solicitudes\Solicitudes;
class ComentarioSolicitudes extends Model
{
    protected $table = 'comentario_solicitudes';
    protected $primaryKey = 'idComentario';
    protected $fillable = ['idSolicitud','idUser','comentario'];
    public function user(){
        return $this->belongsTo('soweb\User', 'idUser');
    }

    public function solicitudes(){
        return $this->belongsTo('soweb\Models\Solicitudes\Solicitudes','idSolicitud');
    }
}
