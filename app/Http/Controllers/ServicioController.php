<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios= Servicio::paginate(5);
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create');
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
            'nombre' => ['required', 'string', 'max:30'],
            'descripcion' => ['required', 'string', 'min:4'],
            'imagen_principal' => 'required',
            'uuid' => 'required|uuid'
            
        ]);
        if(request('imagen_principal')){

            $ruta_imagen= $data['imagen_principal']->store('upload-talleres', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);            
            $img->save();

        }
        Servicio::create([
            'nombre' => $data['nombre'],
            'imagen_principal'=>$ruta_imagen,
            'descripcion' => $data['descripcion'],
            'uuid' => $data['uuid']
        ]);
        return redirect()->route('servicio.index')->with('exito', 'Evento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //obtiene las imagenes
        $imagenes= Imagen::where('id_servicio', $servicio->uuid)->get();
        return view('servicios.edit' , compact('servicio', 'imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        $data= $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
            'descripcion' => ['required', 'string', 'min:4'],
            'uuid' => 'required|uuid'            
        ]);
        //Asignar los valores 

        $servicio->nombre = $data['nombre'];
        $servicio->descripcion = $data['descripcion'];
        $servicio->uuid = $data['uuid'];

        if(request('imagen_principal')){
            
            Storage::disk('public')->delete($servicio->imagen_principal); 

            $ruta_imagen= $request['imagen_principal']->store('upload-talleres', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);            
            $img->save();
            $servicio->imagen_principal= $ruta_imagen;

        }
        $servicio->save();
        return redirect()->route('servicio.index')->with('exito', 'Servicio editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
