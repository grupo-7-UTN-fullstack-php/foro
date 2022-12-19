<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
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
            'fecha_nacimiento' => ['required', 'before:-18 years'],
            'imagen' => ['image']
        ];
        $mensajes = [
            'password' => 'La contraseña debe contener al menos 8 caracteres incluyendo un número, una letra mayúscula y una letra minúscula',
            'email.email' => 'Debe ingresar un email valido',
            'fecha_nacimiento' => 'Debe ser mayor de 18 años'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $datosValidados = $request->except(['password_confirmation', 'email_confirmation', 'password']);


        $nuevoUsuario = new Usuario;
        $path = "";
        if ($request->hasFile("imagen")) {
            $extension = '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->file('imagen')->
            storeAs('/images/post',
                uniqid('', true) .
                uniqid('', true) . $extension,
                'local'
            );
        }
        $datosPorDefecto = [
            'password' => Hash::make($request->get('password')),
            'idEstado' => 2,
            'idRol' => 1,
            'activo' => true,
            'imagen' => $path
        ];
        $nuevoUsuario->fill(array_merge($datosValidados, $datosPorDefecto));
        $nuevoUsuario->save();
        return to_route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($username)
    {
        $usuario = Usuario::encontrarPorUsername($username);
        if ($usuario == null)
            abort('404');
        return view('usuarios/perfil', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit($username)
    {
        $usuario = Usuario::encontrarPorUsername($username);
        return view('usuarios/edit', ['titulo' => 'Editar perfil'], compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * //     * @param int $id
     * @return Application|Factory|View
     */
    public function update(Request $request, $username)
    {
        $nuevoUsuario = Usuario::encontrarPorUsername($username);
        $reglas = [
            'usuario' => ['required', 'alpha_num', 'min:2', 'max:45', 'unique:usuario'],
            'nombre' => ['required', 'alpha_num', 'min:2,max:45'],
            'apellido' => ['required', 'alpha_num', 'min:2', 'max:45'],
            'email' => ['required', 'confirmed', 'email:rfc,dns', 'unique:usuario'],
            'password' => ['required', 'confirmed', Password::min(8)->numbers()->mixedCase()],
            'fecha_nacimiento' => ['required', 'before:-18 years'],
            'imagen' => ['image', 'required']
        ];
        $mensajes = [
            'password' => 'La contraseña debe contener al menos 8 caracteres incluyendo un número, una letra mayúscula y una letra minúscula',
            'email.email' => 'Debe ingresar un email valido',
            'fecha_nacimiento' => 'Debe ser mayor de 18 años'
        ];

//        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $datosValidados = $request->except(['password_confirmation', 'email_confirmation', 'password']);
        $path = "";
        if ($request->hasFile("imagen")) {
            $extension = '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->file('imagen')->
            storeAs('/images/post',
                uniqid('', true) .
                uniqid('', true) . $extension,
                'local'
            );
        } else {
            $path = $nuevoUsuario->imagen;
        }
        $datosPorDefecto = [
            'password' => $nuevoUsuario->password,
            'idEstado' => 2,
            'idRol' => 1,
            'activo' => true,
            'imagen' => $path
        ];
        $nuevoUsuario->fill(array_merge($datosValidados, $datosPorDefecto));
//        dd($nuevoUsuario);
        $nuevoUsuario->save();
        return view('usuarios/perfil', ['usuario' => $nuevoUsuario]);
    }

    /**
     * Remove the specified resource from storage.
     *
//     * @param int $id
     * @return string
     */
    public function destroy($username)
    {
//        dd($usuario);
        Usuario::bajaLogica($username);
        return to_route('home');
    }
}
