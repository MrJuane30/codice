<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ColectivoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ComentarioPublicacion;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\FrontRedirectController;
use App\Http\Controllers\AcontecimientoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Redirección Vuejs
Route::get('redirecccion', [FrontRedirectController::class, 'index'])->middleware('auth', 'verified')->name('redireccion');

Route::get('Homes',  [FrontRedirectController::class, 'index'])->middleware('auth', 'verified', 'profile')->name('homes');
Route::get('home', [FrontRedirectController::class, 'home'])->middleware('auth', 'verified', 'profile')->name('home');
Route::get('admin',  [FrontRedirectController::class, 'index'])->middleware('auth', 'verified')->name('index.admin');

//Usuarios admin
Route::get('usuarios', [UsuarioController::class, 'index'])->middleware('auth', 'verified')->name('usuarios.index');
Route::get('usuario/create', [UsuarioController::class, 'create'])->middleware('auth', 'verified')->name('usuarios.create');
Route::post('usuario', [UsuarioController::class, 'store'])->middleware('auth', 'verified')->name('usuarios.store');
Route::get('usuario/{user}/edit', [UsuarioController::class, 'edit'])->middleware('auth', 'verified')->name('usuarios.edit');
Route::put('usuario/{user}', [UsuarioController::class, 'update'])->middleware('auth', 'verified')->name('usuarios.update');
Route::delete('usuario/{user}', [UsuarioController::class, 'destroy'])->middleware('auth', 'verified')->name('usuarios.destroy');

//Profile
Route::get('profile', [ProfileController::class, 'Edit'])->middleware('auth', 'verified')->name('Profile.index');
Route::put('profile/{profile}/edit', [ProfileController::class, 'update'])->middleware('auth', 'verified')->name('profile.update');

//calendario
Route::get('eventos', [EventosController::class, 'index'])->middleware('auth')->name('eventos');
Route::post('/eventos', [EventosController::class, 'store'])->middleware('auth')->name('eventos.store');
Route::get('/eventos/show', [EventosController::class, 'show'])->middleware('auth')->name('eventos.show');
Route::delete('/eventos/{id}', [EventosController::class, 'destroy'])->middleware('auth')->name('eventos.destroy');
Route::patch('/eventos/{id}', [EventosController::class, 'update'])->middleware('auth')->name('eventos.update');

//Colectivo
Route::get('colectivo', [ColectivoController::class, 'index'])->middleware('auth', 'verified')->name('colectivo.index');
Route::get('colectivo/create', [ColectivoController::class, 'create'])->middleware('auth', 'verified')->name('colectivo.create');
Route::post('colectivo', [ColectivoController::class, 'store'])->middleware('auth', 'verified')->name('colectivo.store');
Route::get('colectivo/{colectivo}/edit', [ColectivoController::class, 'edit'])->middleware('auth', 'verified')->name('colectivo.edit');
Route::put('/colectivo/{colectivo}', [ColectivoController::class, 'update'])->middleware('auth', 'verified')->name('colectivo.update');
Route::delete('/colectivo/{colectivo}', [ColectivoController::class, 'destroy'])->middleware('auth', 'verified')->name('colectivo.destroy');

//Descricpcion,misión, visión y valores
Route::get('/descripcion',  [FrontRedirectController::class, 'descripcion'])->middleware('auth', 'verified', 'profile')->name('descripcion');

//Miembros
Route::get('miembros', [MiembroController::class, 'index'])->middleware('auth', 'verified')->name('miembro.index');
Route::get('miembros/create', [MiembroController::class, 'create'])->middleware('auth', 'verified')->name('miembro.create');
Route::post('miembros', [MiembroController::class, 'store'])->middleware('auth', 'verified')->name('miembro.store');
Route::get('miembros/{miembro}/edit', [MiembroController::class, 'edit'])->middleware('auth', 'verified')->name('miembro.edit');
Route::put('miembros/{miembro}', [MiembroController::class, 'update'])->middleware('auth', 'verified')->name('miembro.update');
Route::delete('miembros/{miembro}', [MiembroController::class, 'destroy'])->middleware('auth', 'verified')->name('miembro.delete');

//Servicios
Route::get('servicios', [ServicioController::class, 'index'])->middleware('auth', 'verified')->name('servicio.index');
Route::get('servicios/create', [ServicioController::class, 'create'])->middleware('auth', 'verified')->name('servicio.create');
Route::post('servicios', [ServicioController::class, 'store'])->middleware('auth', 'verified')->name('servicio.store');
Route::get('servicios/{servicio}/edit', [ServicioController::class, 'edit'])->name('servicio.edit');
Route::put('servicios/{servicio}', [ServicioController::class, 'update'])->name('servicio.update');

//Publicaciones
Route::get('publicaciones', [PublicacionController::class, 'index'])->middleware('auth', 'verified')->name('publicacion.index');
Route::get('publicacion/create', [PublicacionController::class, 'create'])->name('publicacion.create');
Route::post('publicacion', [PublicacionController::class, 'store'])->name('publicacion.store');
Route::get('publicacion/{publicacion}', [PublicacionController::class, 'show'])->name('publicacion.show');
Route::get('publicacion/{publicacion}/edit', [PublicacionController::class, 'edit'])->name('publicacion.edit');
Route::put('publicacion/{publicacion}', [PublicacionController::class, 'update'])->name('publicacion.update');
Route::delete('publicacion/{publicacion}', [PublicacionController::class, 'destroy'])->name('publicacion.destroy');
Route::post('/publicaciones/{publicacion}',[PublicacionController::class, 'storeLike'] );
Route::get('/likes/{publicacion}',[PublicacionController::class, 'like'] );

//Comentarios
Route::get('comentarios', [ComentarioPublicacion::class, 'index'])->middleware('auth', 'verified')->name('comentarios.index');
Route::get('comentarios/publicacion/{publicacion}', [ComentarioPublicacion::class, 'commentsPost'])->middleware('auth', 'verified')->name('comentarios.publicacion');
Route::delete('comentario/{comentario}', [ComentarioPublicacion::class, 'destroy'])->name('comentario.destroy');
Route::get('comentarioUsuario', [ComentarioPublicacion::class, 'userComments'])->name('usuario.comentarios');
//notificaciones
Route::put('notificaciones/{notificacion}', [NotificacionController::class, 'update'])->name('notificacion.update');

//Amigos
Route::get('amigos', [FriendsController::class, 'index'])->middleware('auth', 'verified')->name('amigos.index');
Route::get('/amigos/{friend}', [FriendsController::class, 'show'])->middleware('auth', 'verified')->name('amigos.show');
Route::get('/amigos/{friend}/edit', [FriendsController::class, 'edit'])->middleware('auth', 'verified')->name('amigos.edit');
Route::put('/amigos/{friend}', [FriendsController::class, 'update'])->middleware('auth', 'verified')->name('amigos.update');
Route::delete('amigos/{friend}', [FriendsController::class, 'destroy'])->name('amigos.destroy');

//Eventos
Route::get('acontecimientos', [AcontecimientoController::class, 'index'])->middleware('auth', 'verified')->name('acontecimientos.index');
Route::get('acontecimientos/create', [AcontecimientoController::class, 'create'])->middleware('auth', 'verified')->name('acontecimientos.create');
Route::post('acontecimientos', [AcontecimientoController::class, 'store'])->middleware('auth', 'verified')->name('acontecimientos.store');
Route::get('/acontecimientos/{acontecimiento}/edit', [AcontecimientoController::class, 'edit'])->middleware('auth', 'verified')->name('acontecimientos.edit');
Route::put('/acontecimientos/{acontecimiento}', [AcontecimientoController::class, 'update'])->middleware('auth', 'verified')->name('acontecimientos.update');
Route::delete('acontecimientos/{acontecimiento}', [AcontecimientoController::class, 'destroy'])->middleware('auth', 'verified')->name('acontecimientos.destroy');

//Guardar Imagenes 
Route::post('/imagenes/store', [ImagenController::class, 'store'])->middleware('auth', 'verified')->name('imagenes.store');
Route::post('/imagenes/destroy', [ImagenController::class, 'destroy'])->middleware('auth', 'verified')->name('imagenes.destroy');

//Repositorio
Route::get('repositorio', [DocumentoController::class, 'index'])->middleware('auth', 'verified')->name('repositorio.index');
Route::get('repositorio/create', [DocumentoController::class, 'create'])->middleware('auth', 'verified')->name('repositorio.create');
Route::post('repositorio', [DocumentoController::class, 'store'])->middleware('auth', 'verified')->name('repositorio.store');
Route::get('repositorio/{documento}/edit', [DocumentoController::class, 'edit'])->middleware('auth', 'verified')->name('repositorio.edit');
Route::put('repositorio/{documento}', [DocumentoController::class, 'update'])->middleware('auth', 'verified')->name('repositorio.update');
Route::delete('repositorio/{documento}', [DocumentoController::class, 'destroy'])->middleware('auth', 'verified')->name('repositorio.destroy');
