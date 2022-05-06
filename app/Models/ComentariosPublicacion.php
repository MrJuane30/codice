<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentariosPublicacion extends Model
{
    use HasFactory;
    
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }
}
