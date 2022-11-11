<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LoginController;
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

Route::get('/', static function () {
    return view('home');
});
Route::get('/home', [PostController::class, 'home_index'])->name('home');


//Usuarios
Route::get('registrarse', "UsuarioController@create")->name('usuarios.create');
Route::resource("usuarios", UsuarioController::class, ['except' => ['create', 'index']]);
Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware('auth')->name('usuarios.index');

//Post
Route::resource('/post', PostController::class)->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');

Route::resource('/comentario', ComentarioController::class)->middleware('auth');
