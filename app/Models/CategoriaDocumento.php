<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
    use HasFactory;

    public function getRouteKeyName(){
        return 'slug';
    }
    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
