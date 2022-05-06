<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria_id',
        'url'
    ];

    public function categoriaDocumento(){
        return $this->belongsTo(categoriaDocumento::class, 'categoria_id');
    }

}
