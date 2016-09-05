<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $primaryKey = 'idContacto';

    public function solicitudes(){
        return $this->belongsto(Solicitudes::class);
    }
    public function comentariosContactos(){
        return $this->belongsto(ComentarioContacto::class);
    }
}
