<?php

namespace App\Http\Controllers;

use App\Models\evento;
use App\Models\Colectivo;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use App\Models\Acontecimiento;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class FrontRedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->tipo;

        if ($role==1) {
            $colectivos= Colectivo::latest()
            ->take(5)
            ->get();
            $eventos=evento::latest()
            ->take(5)
            ->get();
            $publicaciones=Publicacion::latest()
            ->take(5)
            ->get();
            return view('admin.index', compact('colectivos', 'eventos', 'publicaciones'));
         } else if ($role==2){
             $megusta= auth()->user()->meGusta()->paginate(4);
             $publicaciones= Publicacion::paginate(3);
             $eventos= Acontecimiento::paginate(3);
           return view('users.index', compact('megusta', 'publicaciones', 'eventos'));
             //return redirect()->route('homes');
         }
    }

    public function home(){
        $colectivos= Colectivo::latest()
        ->take(5)
        ->get();
        $eventos=evento::latest()
        ->take(5)
        ->get();
        $publicaciones=Publicacion::latest()
        ->take(5)
        ->get();
        return view('home', compact('colectivos', 'eventos', 'publicaciones'));
    }

    public function descripcion(){
        return view('descripcion.index');
    }
    
}
