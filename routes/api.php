<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CorreoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-email',[CorreoController::class, 'sendEmail'] );
Route::get('/colectivos', [ApiController::class, 'colectivos'])->name('colectivos');
Route::get('/colectivos/{colectivo}', [ApiController::class, 'show'])->name('colectivos.show');
Route::get('/categorias', [ApiController::class, 'categorias'])->name('categorias');
Route::get('/categorias/{categoria}', [ApiController::class, 'categoria'])->name('categoria');
Route::get('/publicaciones/{publicacion}', [ApiController::class, 'publicacion'])->name('publicacion.show');

Route::post('/create-comment',[ApiController::class, 'createComment'] );
Route::get('/{publicacion}/comentarios',[ApiController::class, 'showComments']);
Route::delete('/comentarios/{id}',[ApiController::class, 'deleteComment']);

Route::post('/codiamigo',[ApiController::class, 'addFriend'] );
Route::get('/amigos', [ApiController::class, 'amigos'])->name('amigos');
Route::get('/events', [ApiController::class, 'eventos'])->name('events');

Route::get('/services', [ApiController::class, 'servicesCarousel'])->name('services');
Route::get('/talleres', [ApiController::class, 'talleres'])->name('talleres');
Route::get('/imagenes/{uuid}',[ApiController::class, 'imgTaller']);
Route::get('/talleres/{servicio}', [ApiController::class, 'taller'])->name('servicios.show');
Route::get('/miembros', [ApiController::class, 'miembros'])->name('miembros');
Route::get('/miembros/{miembro}', [ApiController::class, 'miembro'])->name('miembro.show');

Route::get('/repositorio/{categoria}', [ApiController::class, 'repositorio'])->name('repositorio');

Route::get('/publicacionesPrincipal', [ApiController::class, 'publicacionesPrincipal'])->name('publicaciones.principal');













