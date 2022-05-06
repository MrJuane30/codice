<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\CategoriaDocumento;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos= Documento::paginate(4);
        return view('repositorio.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias= CategoriaDocumento::all(['id', 'nombre']);
        return view('repositorio.create', compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data= $request->validate([
            'titulo' => ['required', 'string', 'max:100'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'min:4'],            
        ]);

        if($data['categoria']==1){
            if(request('documento')){

                $ruta_archivo= $request['documento']->store('upload-repositorioDocumentos', 'public');
            }
        }  else if($data['categoria']==2) {
            if(request('imagen')){

                $ruta_archivo= $request['imagen']->store('upload-respositorioImagenes', 'public');
            
            }
            
        } else if($data['categoria']==3){
            if(request('link')){
                $ruta_archivo= $request['link'];
            }
        }

        Documento::create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'categoria_id' => $request['categoria'],
            'url' => $ruta_archivo
        ]);

        return redirect()->route('repositorio.index')->with('exito', 'Documento agregado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
        $categorias= CategoriaDocumento::all(['id', 'nombre']);
        return view('repositorio.edit', compact('documento', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
        $data= $request->validate([
            'titulo' => ['required', 'string', 'max:100'],
            'categoria' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'min:4'],            
        ]);

        if($data['categoria']==1){
            if(request('documento')){
                Storage::disk('public')->delete($documento->url); 
                $ruta_archivo= $request['documento']->store('upload-repositorioDocumentos', 'public');
                $documento->url= $ruta_archivo;

            }
        }  else if($data['categoria']==2) {
            if(request('imagen')){

                Storage::disk('public')->delete($documento->url); 
                $ruta_archivo= $request['imagen']->store('upload-respositorioImagenes', 'public');
                $documento->url= $ruta_archivo;

            
            }
            
        } else if($data['categoria']==3){
            if(request('link')){
                $ruta_archivo= $request['link'];
                $documento->url= $ruta_archivo;

            }
        }

        $documento->titulo= $data['titulo'];
        $documento->descripcion= $data['descripcion'];
        $documento->categoria_id= $data['categoria'];
        $documento->save();
        return redirect()->route('repositorio.index')->with('exito', 'Documento editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        if($documento->categoria_id==1 || $documento->categoria_id==2 ){
                Storage::disk('public')->delete($documento->url); 
            
        }
        $documento->delete();
}
}
