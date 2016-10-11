<?php

namespace soweb\Models\Solicitudes;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Asesores\Asesores;
use Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'idSolicitud';
    protected $fillable = ['tituloSolicitud','descripcion','fecha',
                           'idContacto','idAsesor','idUser','userUltimaModificacion',
                           'personaContacto','estado','fechaCerrado','tipoSolicitud',
                           'precioCotizacion','precioCobrado'];

    public function estado($valor)
    {
         if ($valor = "cerrada") {
             $this->attributes['fechaCerrado'] = Carbon::now();
         }
    }
    public function asesores(){
        return $this->belongsTo('soweb\Models\Asesores\Asesores','idAsesor');
    }

    public function contactos(){
        return $this->belongsTo('soweb\Models\Contactos\Contactos','idContacto');
    }

    public function comentariosSolicitud(){
        return $this->belongsto(ComentarioSolicitud::class);
    }
    public function user(){
        return $this->belongsTo('soweb\user');
    }
}
