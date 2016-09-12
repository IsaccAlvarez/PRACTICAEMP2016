<?php

namespace soweb\Models\Asesores;

use Illuminate\Database\Eloquent\Model;

class Asesores extends Model
{
    protected $table = 'asesores';

    protected $primaryKey = 'idAsesor';

    protected $fillable = [
        'nombre','iniciales','tipoAsesor', 'fechaCreacion','telefono','emailPersonal'.'emailEmpresa','estado',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'clave', 'remember_token',
    ];

    public function solicitudes(){
        return $this->belongsto(Solicitudes::class);
    }

    public function comentariosSolicitud(){
        return  $this->belongsto(ComentarioSolicitud::class);
    }
    public function comentarioContactos(){
        return  $this->belongsto(ComentarioContacto::class);
    }
}
