<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class ImagenController extends Controller
{
    public function store(Request $request)
    {
         //leer la imagen 
         $ruta_imagen= $request->file('file')->store('Servicios', 'public');
        //resize imagen
        $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);            
        $img->save(); 
        //almacenar con modelo
        $imagenDB= new Imagen;
        $imagenDB->id_servicio= $request['uuid'];
        $imagenDB->ruta_imagen= $ruta_imagen;
        $imagenDB->save();

        $respuesta= [
            'archivo'=> $ruta_imagen
        ];
 
        return response()->json($respuesta);
    }
    public function destroy(Request $request){
        $imagen= $request->get('imagen');

        if(File::exists('storage/'.$imagen)){
            //elimina del server
            File::delete('storage/'.$imagen);
            //elimina de la bd
            Imagen::where('ruta_imagen', '=', $imagen)->delete();

            $respuesta= [
                'mensaje'=> 'Imagen eliminada',
                'imagen' => $imagen
            ];
        }
    
        return response()->json($respuesta);
    }
}
