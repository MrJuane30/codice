<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acontecimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AcontecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acontecimientos= DB::table('acontecimientos')->orderBy('fecha')->paginate(5);
        return view('eventos.index', compact('acontecimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eventos.create');

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
            'imagen'=> ['required'],
            'fecha' => ['required'],
            'txtHora' => ['required'],
            'descripcion'=>'required'
        ]);
        if(request('imagen')){

            $ruta_imagen= $data['imagen']->store('upload-acontecimiento', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);

            
            $img->save();


        }

        Acontecimiento::create([
            'nombre' => $data['nombre'],
            'imagen'=>$ruta_imagen,
            'fecha' => $data['fecha']."  ".$data['txtHora'],
            'link' => $request['link'],
            'direccion' =>$request['direccion'],
            'descripcion' => $data['descripcion']
        ]);
        return redirect()->route('acontecimientos.index')->with('exito', 'Evento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acontecimiento  $acontecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Acontecimiento $acontecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acontecimiento  $acontecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Acontecimiento $acontecimiento)
    {
        return view('eventos.edit', compact('acontecimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acontecimiento  $acontecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acontecimiento $acontecimiento)
    {
        $data= $request->validate([
            'nombre' => ['required'],
            'fecha' => ['required'],
            'txtHora' => ['required'],
            'descripcion'=>'required'
        ]);
        $acontecimiento->nombre = $data['nombre'];
        $acontecimiento->fecha = $data['fecha']."  ".$data['txtHora'];
        $acontecimiento->link= $request['link'];
        $acontecimiento->direccion= $request['direccion'];
        $acontecimiento->descripcion= $data['descripcion'];

        if(request('imagen')){
            
            Storage::disk('public')->delete($acontecimiento->foto); 

            $ruta_imagen= $request['imagen']->store('upload-amigos', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);            
            $img->save();
            $acontecimiento->imagen= $ruta_imagen;

        }
        $acontecimiento->save();
        return redirect()->route('acontecimientos.index')->with('exito', 'Evento editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acontecimiento  $acontecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acontecimiento $acontecimiento)
    {
        Storage::disk('public')->delete($acontecimiento->imagen); 
        $acontecimiento->delete();
    }
}
