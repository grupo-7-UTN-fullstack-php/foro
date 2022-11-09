<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UsuarioController;

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
Route::get('/home', function () {
    return view('home');
})->name('home');


//Usuarios
Route::get('registrarse',"UsuarioController@create")->name('usuarios.create');
Route::resource("usuarios",UsuarioController::class,['except' => ['create','index']]);
Route::get('/usuarios', [UsuarioController::class,'index'])->middleware('auth')->name('usuarios.usuarios');

//Auth::routes();

//Login
Route::get('/login',[\App\Http\Controllers\LoginController::class,'create'])->name('login.create');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'store'])->name('login.store');
Route::post('/logout', [\App\Http\Controllers\LoginController::class,'destroy'])->name('login.destroy');
