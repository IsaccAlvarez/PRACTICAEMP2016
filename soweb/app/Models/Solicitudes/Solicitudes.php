<?php

namespace soweb\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'idSolicitud';


    public function asesores(){
        return $this->hasMany(Aseseros::class);
    }

    public function contactos(){
        return $this->hasMany(Contactos::class);
    }

    public function comentariosSolicitud(){
        return $this->belongsto(ComentarioSolicitud::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
