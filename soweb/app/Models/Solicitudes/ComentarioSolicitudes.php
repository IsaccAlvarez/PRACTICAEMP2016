<?php

namespace soweb\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class ComentarioSolicitudes extends Model
{
    protected $table = 'comentarioSolicitudes';
    protected $primaryKey = 'idComentario';

    public function asesores(){
        return $this->hasMany(Aseseros::class);
    }

    public function solicitudes(){
        return $this->hasMany(Solicitudes::class);
    }
}
