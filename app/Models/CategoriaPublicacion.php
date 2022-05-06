<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPublicacion extends Model
{
    use HasFactory;

    public function getRouteKeyName(){
        return 'slug';
    }

    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }
}
