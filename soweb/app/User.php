<?php

namespace soweb;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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

    public function setPasswordAttribute($valor){
       if(!empty($valor)){
           $this->attributes['password'] = \Hash::make($valor);
       }
   }
   public function Contactos()
   {
     return $this->belongsto(Contactos::class);
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
       return  $this->belongsto(ComentarioContacto::class);
   }


}
