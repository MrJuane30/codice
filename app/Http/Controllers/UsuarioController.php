<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= User::paginate(4);
        return view('admin.usuarios')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarioCreate');
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
            'name' => ['required', 'string', 'max:255'],
            'apellidos'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo'=>'required'
        ]);
    
        User::create([
            'name' => $data['name'],
            'apellidos'=>$data['apellidos'],
            'email' => $data['email'],
            'tipo' => $data['tipo'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('usuarios.index')->with('exito', 'Usuario creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('admin.usuarioEdit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);

        $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellidos'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id, 'id')],
            'tipo'=>'required'
        ]);
        $user->name = $data['name'];
        $user->apellidos = $data['apellidos'];
        $user->email = $data['email'];
        $user->tipo = $data['tipo'];
        $user->save();

        return redirect()->route('usuarios.index')->with('exito', 'Usuario editado correctamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        //$user->truncate();
    }
}
