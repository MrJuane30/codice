<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amigos= Friend::paginate(4);
        return view('friends.index')->with('amigos', $amigos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        return view('friends.show')->with('friend', $friend);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        return view('friends.edit', compact('friend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        $data= $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:255'],
            'correo' => ['required'],
            'numero' => ['required'],
            'tipo' => ['required']
        ]);

        //Asignar los valores 

        $friend->nombre = $data['nombre'];
        $friend->apellidos = $data['apellidos'];
        $friend->correo = $data['correo'];
        $friend->telefono = $data['numero'];
        $friend->tipo= $data['tipo'];
        $friend->comentario= $request['comentario'];



        if(request('foto')){
            
            Storage::disk('public')->delete($friend->foto); 

            $ruta_imagen= $request['foto']->store('upload-amigos', 'public');
            $img= Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,400);            
            $img->save();
            $friend->foto= $ruta_imagen;

        }
        $friend->save();
        return redirect()->route('amigos.index')->with('exito', 'Amigo editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        Storage::disk('public')->delete($friend->foto); 
        $friend->delete();
    }
}
