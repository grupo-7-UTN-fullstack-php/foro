<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [PostController::class, 'home_index']);

Route::get('/home', [PostController::class, 'home_index'])->name('home');


//Usuarios
Route::get('registrarse', "UsuarioController@create")->name('usuarios.create');
Route::resource("usuarios", UsuarioController::class, ['except' => ['create', 'index','show']]);
Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware('auth')->name('usuarios.index');
Route::get('perfil/{username}',[UsuarioController::class,'show'])->name('usuarios.show');

//Post
Route::resource('/post', PostController::class)->except(['show','store'])->middleware('auth');
Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');


//Login
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');

//Comentario
Route::post('post/{id}', [ComentarioController::class, 'store'])->name('comentario.store')->middleware('auth');

//Perfil
//Route::resource('perfil', PerfilController::class)->middleware('auth');
