<?php

namespace soweb\Models\Asesores;

use Illuminate\Database\Eloquent\Model;

class Asesores extends Model
{
    protected $table = 'asesores';

    protected $primaryKey = 'idAsesor';

    protected $fillable = [
        'nombre','iniciales', 'fechaCreacion','telefono','emailPersonal','emailEmpresa','estado','fechaIngreso',
        'fechaUltimaModificacion', 'idAsesorUltimaModificacion',

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
    public function scopeBuscar ($query, $dato="")
    {
      if (trim($nombre)!="") {
      $result = $query->where('nombre',"LIKE", "%".$dato."%")
                        ->orWhere('emailEmpresa',"LIKE","%".$dato."%");
      }
      return $result;
    }
}
