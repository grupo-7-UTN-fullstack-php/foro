<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ValoracionController;

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

Route::get('/', [PostController::class, 'home_index'])->name('root');

Route::get('/home', [PostController::class, 'home_index'])->name('home');


//Usuarios
Route::get('registrarse', "UsuarioController@create")->name('usuarios.create');
Route::resource("usuarios", UsuarioController::class, ['except' => ['create', 'index', 'show']]);
Route::get('/usuarios', [UsuarioController::class, 'index'])
    ->middleware('auth')->middleware('can:admin')->name('usuarios.index');
Route::get('perfil/{username}', [UsuarioController::class, 'show'])->name('usuarios.show');

//Post
Route::resource('/post', PostController::class)->except(['show'])->middleware('auth');
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');


//Login
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');

//Comentario

Route::post('post/{id}', [ComentarioController::class, 'store'])->name('comentario.store')->middleware('auth');

//Reacciones
Route::get('valoracion/{idValoracion}/{publicacion}/{idPublicacion}', [ValoracionController::class, 'cantidadValoracion'])->name('valoracion.cantidad');
Route::post('valoracion/{idValoracion}/{publicacion}/{idPublicacion}', [ValoracionController::class, 'guardarValoracion'])->name('valoracion.guardar')->middleware('auth');
Route::delete('valoracion/{idValoracion}/{publicacion}/{idPublicacion}', [ValoracionController::class, 'eliminarValoracion'])->name('valoracion.eliminar')->middleware('auth');

Route::get('valoracion/{idValoracion}/comentario/{idComentario}', [ValoracionController::class, 'cantidadValoracionComentario'])->name('valoracionComentario.cantidad');
Route::post('valoracion/{idValoracion}/comentario/{idComentario}', [ValoracionController::class, 'guardarValoracionComentario'])->name('valoracionComentario.guardar')->middleware('auth');
Route::delete('valoracion/{idValoracion}/comentario/{idComentario}', [ValoracionController::class, 'eliminarValoracionComentario'])->name('valoracionComentario.eliminar')->middleware('auth');

Route::get('/texteditor', function () {
    return view('editor');
})->name('texteditor');

//Reportes
Route::post('/reportar', [\App\Http\Controllers\ReporteController::class, 'store'])->middleware('auth')->name('reportar');
Route::get('/misReportes', [\App\Http\Controllers\ReporteController::class, 'mostrarReportesDelUsuario'])->name('misReportes');
Route::get('/reportes', [\App\Http\Controllers\ReporteController::class, 'mostrarReportes'])->name('reportes')->middleware('can:mod');
Route::patch('/reportes', [\App\Http\Controllers\ReporteController::class, 'actualizarReporte'])->name('reportes.update')->middleware('can:mod');
//Perfil
//Route::resource('perfil', PerfilController::class)->middleware('auth');
