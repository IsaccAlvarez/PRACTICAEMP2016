<?php

namespace soweb\Models\Asesores;
use soweb\Models\Solicitudes\Solicitudes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesores extends Model
{
  use SoftDeletes;
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
     protected $dates = ['deleted_at'];

    public function solicitudes(){
        return $this->hasMany('soweb\Models\Solicitudes\Solicitudes','idSolicitud');
    }

    public function user(){
        return $this->hasMany('soweb\User');
    }

}
