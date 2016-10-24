<?php

namespace soweb;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use soweb\Models\Solicitudes\ComentarioSolicitudes;
use soweb\Models\Solicitudes\Solicitudes;
use Crypt;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'tipoUser','password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];
    public function setPasswordAttribute($valor){
       if(!empty($valor)){
           $this->attributes['password'] = \Hash::make($valor);
       }
   }



   public function Contactos()
   {
     return $this->HasMany('soweb\contactos');
   }
   public function solicitudes()
   {
     return $this->belongsto(Solicitudes::class);
   }
   public function asesores()
   {
     return $this->belongsto(Asesores::class);
   }
   public function comentariosSolicitud(){
       return  $this->belongsto(ComentarioSolicitud::class);
   }
   public function comentarioContactos(){
       return  $this->HasMany(ComentarioContacto::class);
   }


}
