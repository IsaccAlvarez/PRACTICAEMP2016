<?php

namespace soweb\Models\Contactos;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $primaryKey = 'idContacto';
    protected $fillable = [
        'nombre','esEmpresa','nombreJuridico','nombreRepresentante', 'telefono','email',
        'direccion','emailCobro','telCobro','personaCobra','tipoContacto','estado','fechaCreacion','idAsesorCreador',
        'fechaUltimaModificacion', 'idAsesorUltimaModificacion',

    ];

    public function solicitudes(){
        return $this->belongsto(Solicitudes::class);
    }
    public function comentariosContactos(){
        return $this->belongsto(ComentarioContacto::class);
    }
    public function scopeSearch($query, $nombre)
    {
      if (trim($nombre) != '') {
        $result = $query->where('nombre',"LIKE", "%".$nombre."%");
      }

    }


}
