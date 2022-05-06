<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaPublicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones= Publicacion::paginate(5);

        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias= CategoriaPublicacion::all(['id', 'nombre']);
        if(auth()->user()->tipo == 2){
            return redirect()->route('redireccion');
        } else {
            return view('publicaciones.create', compact('categorias'));

        }

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
            'titulo' => ['required', 'string', 'max:30'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'min:4'],
             'imagen' => 'required|image',
            'contenido' => ['required'],
            
        ]);

        if(request('imagen')){

            $ruta_imagen= $request['imagen']->store('upload-publicaciones', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);            
            $img->save();

        }

        auth()->user()->publicaciones()->create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'contenido' => $data['contenido'],
            'fuentes' =>$request['fuentes'],
            'imagen' => $ruta_imagen,
            'categoria_id'=>$data['categoria']
        ]);

        DB::table('notificacions')->insert([
            'user_id' => Auth::user()->id,
            'titulo'=> 'Nueva publicacion',
            'descripcion' => 'Se ha creado una nueva publicacion',
            'tipo' => 'publicacion.index',
            'estado' => 1
        ]);
        return redirect()->route('publicacion.index')->with('exito', 'Publicacion creada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $publicacion)
    {
        $categorias= CategoriaPublicacion::all(['id', 'nombre']);
        return view('publicaciones.edit', compact('publicacion', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        $data= $request->validate([
            'titulo' => ['required', 'string', 'max:30'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'min:4'],
            'contenido' => ['required'],
            
        ]);

        //Asignar los valores 

        $publicacion->titulo = $data['titulo'];
        $publicacion->categoria_id = $data['categoria'];
        $publicacion->descripcion = $data['descripcion'];
        $publicacion->contenido = $data['contenido'];
        $publicacion->fuentes = $request['fuentes'];


        if(request('imagen')){
            
            Storage::disk('public')->delete($publicacion->imagen); 

            $ruta_imagen= $request['imagen']->store('upload-publicaciones', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);            
            $img->save();
            $publicacion->imagen= $ruta_imagen;

        }
        $publicacion->save();
        return redirect()->route('publicacion.index')->with('exito', 'Publicación editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $publicacion)
    {
        Storage::disk('public')->delete($publicacion->imagen); 
        $publicacion->delete();
    }

    public function storeLike(Publicacion $publicacion){
        return auth()->user()->meGusta()->toggle($publicacion);
   }

   public function like(Publicacion $publicacion){
    $like = ( auth()->user() ) ?  auth()->user()->meGusta->contains($publicacion->id) : false; 
    $likess = $publicacion->likes->count();

    $likes= array(
        'like' => $like,
        'likes' => $likess
    );
    return response()->json($likes);
}
}
