<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descripcion', 'contenido', 'imagen', 'categoria_id', 'fuentes'
    ];
    public function categoriaPublicacion(){
        return $this->belongsTo(CategoriaPublicacion::class, 'categoria_id');
    }

    public function autor(){
        return $this->belongsTo(User:: class, 'user_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes_publicacion');
    }

    public function comentarios(){
        return $this->belongsToMany(User::class, 'comentarios_publicacion');
    }
}
