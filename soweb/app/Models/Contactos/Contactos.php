<?php

namespace soweb\Models\Contactos;
use soweb\Models\Solicitudes\Solicitudes;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $primaryKey = 'idContacto';
    protected $fillable = [
        'nombre','esEmpresa','nombreJuridico','nombreRepresentante', 'telefono','email',
        'direccion','emailCobro','telCobro','personaCobra','tipoContacto','estado','idUser',
       'userUltimaModificacion',

    ];

    public function solicitudes(){
        return $this->hasMany('soweb\Models\Solicitudes\Solicitudes','idSolicitud');
    }
    public function comentariosContactos(){
        return $this->hasMany('soweb\ComentarioContacto');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }



}
