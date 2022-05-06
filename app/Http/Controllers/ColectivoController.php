<?php

namespace App\Http\Controllers;

use App\Models\Colectivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class ColectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colectivos= Colectivo::paginate(4);
        return view('colectivos.index', compact('colectivos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colectivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|max:255',
            'imagen_principal' => 'required',
            'direccion'=> 'required|min:15',
            'colonia'=> 'required',
            'descripcion' => 'required'
        ]);

        if(request('imagen_principal')){

            $ruta_imagen= $data['imagen_principal']->store('upload-colectivo', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);

            
            $img->save();


        }

        Colectivo::create([
            'nombre' => $data['nombre'],
            'imagen_principal'=>$ruta_imagen,
            'direccion' => $data['direccion'],
            'colonia' => $data['colonia'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
            'pagina_web' => $request['pagina_web'],
            'hashtag' => $request['hashtag'],
            'descripcion'=> $data['descripcion']
        ]);

        DB::table('notificacions')->insert([
            'user_id' => Auth::user()->id,
            'titulo'=> 'Nuevo colectivo',
            'descripcion' => 'Se ha creado un nuevo colectivo',
            'tipo' => 'colectivo.index',
            'estado' => 1
        ]);

        return redirect()->route('colectivo.index')->with('exito', 'Colectivo agregado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colectivo  $colectivo
     * @return \Illuminate\Http\Response
     */
    public function show(Colectivo $colectivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colectivo  $colectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Colectivo $colectivo)
    {
        return view('colectivos.edit', compact('colectivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colectivo  $colectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colectivo $colectivo)
    {
        $data = $request->validate([
            'nombre' => 'required|max:255',
            'direccion'=> 'required|min:15',
            'colonia'=> 'required',
            'descripcion' => 'required'
        ]);
        if(request('imagen_principal')){

            $ruta_imagen= $request['imagen_principal']->store('upload-colectivo', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);

            
            $img->save();

            $colectivo->imagen_principal= $ruta_imagen;


        }

        $colectivo->nombre= $data['nombre'];
        $colectivo->direccion= $data['direccion'];
        $colectivo->colonia= $data['colonia'];
        $colectivo->lat= $request['lat'];
        $colectivo->lng= $request['lng'];
        $colectivo->pagina_web= $request['pagina_web'];
        $colectivo->hashtag= $request['hashtag'];
        $colectivo->descripcion= $data['descripcion'];
        $colectivo->save();
        return redirect()->route('colectivo.index')->with('exito', 'Colectivo editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colectivo  $colectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colectivo $colectivo)
    {
        $colectivo->delete();

    }
}
