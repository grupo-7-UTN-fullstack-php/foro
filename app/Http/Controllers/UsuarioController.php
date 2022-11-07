<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ValidatedInput;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */


    public function index()
    {
        $camposUsuario = DB::select("select COLUMN_NAME
                                            from INFORMATION_SCHEMA.COLUMNS
                                        where TABLE_NAME = 'usuario'");

        $todosLosUsuarios = DB::select("select * from usuario");

        $camposUsuario = array_map(static function($e) {return $e->COLUMN_NAME;}, $camposUsuario);

        return view("index",[
            'campos' => $camposUsuario,
            'elementos' => $todosLosUsuarios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("usuarios/crear");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'llegue';

        $reglas = [
            'usuario' => ['required','alpha_num','min:2','max:45'],
            'nombre' => ['required','alpha_num','min:2,max:45'],
            'apellido' => ['required','alpha_num','min:2','max:45'],
            'email' => ['required','confirmed' , 'email:rfc,dns'],
            'password' => ['required','confirmed',Password::min(8)->numbers()->mixedCase()],
            'fecha_nacimiento' => ['required','before:-18 years']
        ];
        $mensajes = [
            'password' => 'La contraseña debe contener al menos 8 caracteres incluyendo un número, una letra mayúscula y una letra minúscula',
            'email.email' => 'Debe ingresar un email valido',
            'fecha_nacimiento' => 'Debe ser mayor de 18 años'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();

        $datosValidados = $validated = $request->except(['password_confirmation', 'email_confirmation']);
        $datosPorDefecto = [
            'idEstado' => 4,
            'idRol' => 1,
            'activo' => true
            ];


        DB::table('usuario')->insert(array_merge($datosValidados, $datosPorDefecto));

        return null;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
