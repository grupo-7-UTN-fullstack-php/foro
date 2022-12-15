<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ValidatedInput;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */


    public function index()
    {
        $campos = array_slice(Usuario::getColumns(), 0, 5);//esto resuelve pero no es lo ideal
        return view("index", [
            'campos' => $campos,
            'elementos' => Usuario::all('idUsuario', 'usuario', 'nombre', 'apellido', 'email', 'fecha_nacimiento')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("usuarios/register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $reglas = [

            'usuario' => ['required', 'alpha_num', 'min:2', 'max:45', 'unique:usuario'],
            'nombre' => ['required', 'alpha_num', 'min:2,max:45'],
            'apellido' => ['required', 'alpha_num', 'min:2', 'max:45'],
            'email' => ['required', 'confirmed', 'email:rfc,dns', 'unique:usuario'],
            'password' => ['required', 'confirmed', Password::min(8)->numbers()->mixedCase()],
            'fecha_nacimiento' => ['required', 'before:-18 years']

        ];
        $mensajes = [
            'password' => 'La contraseña debe contener al menos 8 caracteres incluyendo un número, una letra mayúscula y una letra minúscula',
            'email.email' => 'Debe ingresar un email valido',
            'fecha_nacimiento' => 'Debe ser mayor de 18 años'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();

        $datosValidados = $request->except(['password_confirmation', 'email_confirmation', 'password']);

        $datosPorDefecto = [
            'password' => Hash::make($request->get('password')),
            'idEstado' => 2,
            'idRol' => 1,
            'activo' => true
        ];

        $nuevoUsuario = new Usuario;
        $nuevoUsuario->fill(array_merge($datosValidados, $datosPorDefecto));
        $nuevoUsuario->save();

        return to_route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($username)
    {
        $usuario = Usuario::encontrarPorUsername($username);
        if($usuario == null)
            abort('404');
        return view('usuarios/perfil',['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
