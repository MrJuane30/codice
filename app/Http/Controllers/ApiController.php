<?php

namespace App\Http\Controllers;

use auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Friend;
use App\Models\Imagen;
use App\Models\Miembro;
use App\Models\Profile;
use App\Mail\AmigoPlata;
use App\Models\Servicio;
use App\Models\Colectivo;
use App\Models\Documento;
use App\Mail\AmigoDiamante;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use App\Models\Acontecimiento;
use App\Models\CategoriaDocumento;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaPublicacion;
use Illuminate\Support\Facades\Mail;
use App\Models\ComentariosPublicacion;

class ApiController extends Controller
{
    //Mostrar todos los colectivos

    public function colectivos(){
        $colectivos= Colectivo::all();
        return response()->json($colectivos);
    }

    public function show(Colectivo $colectivo){
        
        return response()->json($colectivo);
    }

    public function categorias()
    {
        $categorias= CategoriaPublicacion::all();
        return response()->json($categorias);
    }

    public function categoria(CategoriaPublicacion $categoria){

        $publicaciones= Publicacion::where('categoria_id', $categoria->id)->with('categoriaPublicacion')->get();
        return response()->json($publicaciones);
    }

    public function publicacion(Publicacion $publicacion){
        $User= User::where('id', $publicacion->user_id)->get('name');
        $apellido= User::where('id', $publicacion->user_id)->get('apellidos');
        $fecha =($publicacion->created_at);
        $fechaComoEntero = strtotime($fecha);
        $dia= date("d", $fechaComoEntero);
        $anio = date("Y", $fechaComoEntero);
        $mes = date("m", $fechaComoEntero); 
        $publi= array(
        "autor" => $User[0]['name']." ".$apellido[0]['apellidos'], 
        "titulo" => $publicacion->titulo,
        "imagen" =>$publicacion->imagen,
         "descripcion" => $publicacion->descripcion,
        'contenido' => $publicacion->contenido,
         'fecha' => $dia."-".$mes."-".$anio,
        'fuentes' => $publicacion->fuentes,
        "id" => $publicacion->id,
    );
        return response()->json($publi);
    }

    public function createComment(Request $request){
        $validatedData = $request->validate([
            'idUser' => 'required',
            'idPublicacion' => 'required',
            'contenido'=> 'required'
        ]);
        $usuario= User::where('id', $validatedData['idUser'])->get('name');
        $imagen= Profile::where('user_id', $validatedData['idUser'])->get('image');
        $date= Carbon::now()->format('Y-m-d');
        DB::table('comentarios_publicacions')->insert([
            'user_id' => $validatedData['idUser'],
            'publicacion_id' => $validatedData['idPublicacion'],
            'contenido' => $validatedData['contenido'],
            'autor' => $usuario[0]['name'],
            'imagen' => $imagen[0]['image'],
            'created_at'=> $date
        ]);
        DB::table('notificacions')->insert([
            'user_id' => $validatedData['idUser'],
            'titulo'=> 'Nuevo comentario',
            'descripcion' => 'Se ha posteado un nuevo comentario',
            'tipo' => 'comentarios.index',
            'estado' => 1
        ]);
        

        return response()->json([
            'mensaje' => 'comentario creado']);

    }

    public function showComments(Publicacion $publicacion, Request $request){
        /*$comentarios= DB::table('comentarios_publicacions')->where('publicacion_id', $publicacion->id)->latest()->take(5)
        ->get();*/
        $comentarios= ComentariosPublicacion::where('publicacion_id', $publicacion->id)->paginate(2);
        //return response()->json($comentarios);

        return [
            'pagination' => [
                'total' => $comentarios->total(),
                'current_page' => $comentarios->currentPage(),
                'per_page'=> $comentarios->perPage(),
                'last_page' => $comentarios->lastPage(),
                'from' => $comentarios->firstItem(),
                'to' => $comentarios->lastItem()
            ],
            'comentarios' => $comentarios
        ];
    }

    public function deleteComment($id){
        $comment= ComentariosPublicacion::find($id);
        $comment->delete();
    }

    public function addFriend(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'correo'=> 'required',
            'numero'=> 'required',
            'tipo'=> 'required',
        ]);

            if($validatedData['tipo']=="diamante"){
                $correo= new AmigoDiamante();

                Mail::to($validatedData['correo'])->send($correo);
            } else if($validatedData['tipo']=="plata"){
                $correo= new AmigoPlata();

                Mail::to($validatedData['correo'])->send($correo);
            }
        
        DB::table('friends')->insert([
            'nombre' => $validatedData['name'],
            'apellidos' => $validatedData['lastname'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['numero'],
            'tipo' => $validatedData['tipo'],
        ]);

        return response()->json([
            'Mensaje' => '¡Solicitud enviada!']);

    }
    public function amigos(){
        $amigos= Friend::where('foto', '!=', 'NULL')->get();
        return response()->json($amigos);
    }

    public function eventos(){
       $acontecimientos= Acontecimiento::paginate(3);

        return [
            'pagination' => [
                'total' => $acontecimientos->total(),
                'current_page' => $acontecimientos->currentPage(),
                'per_page'=> $acontecimientos->perPage(),
                'last_page' => $acontecimientos->lastPage(),
                'from' => $acontecimientos->firstItem(),
                'to' => $acontecimientos->lastItem()
            ],
            'eventos' => $acontecimientos
        ];
     

    }

    public function servicesCarousel(){
        $servicios = Servicio::latest()->take(5)->get();
        return response()->json($servicios);
    }
    public function talleres(){
        $talleres = Servicio::all();
        return response()->json($talleres);
    }

    public function imgTaller($uuid){
        $imagenes= Imagen::where('id_servicio', $uuid)->get();
        return response()->json($imagenes);
    }
    public function taller(Servicio $servicio){
        $imagenes= Imagen::where('id_servicio', $servicio->uuid)->get();
        $servicio->imagenes= $imagenes;
        return response()->json($servicio);
    }
    public function miembros(){
        $miembros = Miembro::all();
        return response()->json($miembros);
    }
    public function miembro(Miembro $miembro){
       
        return response()->json($miembro);
    }
    public function repositorio(CategoriaDocumento $categoria){

        $documentos= Documento::where('categoria_id', $categoria->id)->with('categoriaDocumento')->get();
        return response()->json($documentos);
    }

    public function publicacionesPrincipal(){
        $publicaciones=Publicacion::latest()
        ->take(3)
        ->get();        
        return response()->json($publicaciones);
    }

    public function publicacionesBlog(){
        $publicaciones= Publicacion::paginate(4);
        return response()->json($publicaciones);
    }
}
