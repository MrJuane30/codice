<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MiembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miembros= Miembro::paginate(4);
        return view('miembros.index', compact('miembros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('miembros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'curriculum' => ['required'],
             'imagen' => 'required',            
        ]);

        if(request('imagen')){

            $ruta_imagen= $request['imagen']->store('upload-miembros', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,800);            
            $img->save();

        }

        Miembro::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'intereses' => $request['intereses'],
            'curriculum' => $data['curriculum'],
            'gustos' => $request['gustos'],
            'imagen' => $ruta_imagen,
        ]);

        return redirect()->route('miembro.index')->with('exito', 'Miembro agregado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function show(Miembro $miembro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function edit(Miembro $miembro)
    {
        //
        return view('miembros.edit', compact('miembro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Miembro $miembro)
    {
        //
        $data= $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'curriculum' => ['required'],
        ]);

        $miembro->nombre = $data['nombre'];
        $miembro->apellidos = $data['apellidos'];
        $miembro->curriculum = $data['curriculum'];
        $miembro->gustos = $request['gustos'];
        $miembro->intereses = $request['intereses'];


        if(request('imagen')){
            
            Storage::disk('public')->delete($miembro->imagen); 

            $ruta_imagen= $request['imagen']->store('upload-publicaciones', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,800);            
            $img->save();
            $miembro->imagen= $ruta_imagen;

        }
        $miembro->save();
        return redirect()->route('miembro.index')->with('exito', 'Miembro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Miembro $miembro)
    {
        Storage::disk('public')->delete($miembro->imagen); 
        $miembro->delete();
    }
}
