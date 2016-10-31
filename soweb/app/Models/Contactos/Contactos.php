<?php

namespace soweb\Models\Contactos;
use soweb\Models\Solicitudes\Solicitudes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactos extends Model
{
  use SoftDeletes;
    protected $table = 'contactos';

    protected $primaryKey = 'idContacto';
    protected $fillable = [
        'nombre','esEmpresa','nombreJuridico','nombreRepresentante', 'telefono','email',
        'direccion','emailCobro','telCobro','personaCobra','tipoContacto','estado','idUser',
       'userUltimaModificacion',

    ];
    protected $dates = ['deleted_at'];
    public function solicitudes(){
        return $this->hasMany('soweb\Models\Solicitudes\Solicitudes','idSolicitud');
    }
    public function comentariosContactos(){
        return $this->hasMany('soweb\ComentarioContacto');
    }

    public function users(){
        return $this->belongsTo('soweb\User');
    }



}
