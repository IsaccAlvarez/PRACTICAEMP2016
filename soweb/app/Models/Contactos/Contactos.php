<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $primaryKey = 'idContacto';
    protected $fillable = [
        'nombre','esEmpresa','nombreJuridico','nombreRepresentante', 'telefono','email',
        'direccion','emailCobro','telCobro','personaCobra','tipoContacto','estado','idUser',
       'idUserUltimaModificacion',

    ];

    public function solicitudes(){
        return $this->belongsto(Solicitudes::class);
    }
    public function comentariosContactos(){
        return $this->hasMany('soweb\ComentarioContacto');
    }

    public function users(){
        return $this->hasMany(User::class);
    }



}
