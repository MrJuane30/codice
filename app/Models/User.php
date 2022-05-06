<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellidos',
        'email',
        'password',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento perfil creado
    protected static function boot(){
        Parent::boot();
        //Asignar perfil
        static::created(function($user){
            $user->perfil()->create();
        });
    }

    public function perfil(){
        //Relación 1 a 1 
        return $this->hasOne(Profile::class);
    }

    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }

    //Publicaciones que al usuario ha dado me gusta
    public function meGusta(){
        return $this->belongsToMany(Publicacion::class, 'likes_publicacion', 'user_id','publicacion_id');
    }

    //Publicaciones que el usuario ha comentado
    public function comments(){
        return $this->belongsToMany(Publicacion::class, 'comentarios_publicacion', 'user_id','publicacion_id');
    }
}
