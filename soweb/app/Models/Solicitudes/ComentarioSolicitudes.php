<?php

namespace soweb\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class ComentarioSolicitudes extends Model
{
    protected $table = 'comentarioSolicitudes';
    protected $primaryKey = 'idComentario';

    public function user(){
        return $this->hasMany(User::class);
    }

    public function solicitudes(){
        return $this->hasMany(Solicitudes::class);
    }
}
