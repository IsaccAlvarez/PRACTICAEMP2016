<?php

namespace soweb\Models\Asesores;
use soweb\Models\Solicitudes\Solicitudes;
use Illuminate\Database\Eloquent\Model;

class Asesores extends Model
{
    protected $table = 'asesores';

    protected $primaryKey = 'idAsesor';

    protected $fillable = [
        'nombre','iniciales', 'fechaCreacion','telefono','emailPersonal','emailEmpresa','estado','fechaIngreso',
        'idUser','userUltimaModificacion',

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
        return $this->hasMany('soweb\Models\Solicitudes\Solicitudes','idSolicitud');
    }

    public function user(){
        return $this->hasMany(User::class);
    }

}
