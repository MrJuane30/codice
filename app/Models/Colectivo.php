<?php

namespace App\Models;

use App\Models\Colectivo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colectivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen_principal',
        'direccion',
        'colonia',
        'lat',
        'lng',
        'pagina_web',
        'hashtag',
        'descripcion'
    ];
}
