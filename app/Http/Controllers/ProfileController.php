<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $usuario= Auth::user();
        $profile= $usuario->perfil;
        return view('profile.edit', compact('usuario'), compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $id= $profile->user_id;
        $user=User::findOrFail($id);
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellidos'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id, 'id')],
            'sexo' => ['required'],
        ]);   

        $user->name = $data['name'];
        $user->apellidos = $data['apellidos'];
        $user->email = $data['email'];
        $profile->sexo= $data['sexo'];
        if(request('image')){

            $ruta_imagen= $request['image']->store('upload-perfil', 'public');

            $profile->image= $ruta_imagen;

        }
        $user->save();
        $profile->save();
        if(Auth::user()->tipo==1){
            return redirect()->route('usuarios.index')->with('exito', 'Perfil editado correctamente');
        } else if(Auth::user()->tipo==2){
            return redirect()->route('homes')->with('exito', 'Perfil editado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
