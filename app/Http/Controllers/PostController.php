<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function home_index()
    {
        return view("home", [
            'posts' => Post::obtenerTodosLosPosts()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $usuario = Auth::user();
        return view("home", [
            'posts' => Post::obtenerPostsDeUnUsuario($usuario->getAuthIdentifier()),
            'usuario' => $usuario
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("posteos/post", ['titulo' => 'Crear post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $reglas = [
            'titulo' => ['required', 'min:2', 'max:45', 'unique:post'],
            'contenido' => ['required', 'min:2,max:255'],

        ];
        $mensajes = [
            'titulo' => 'algún mensaje a enviar',
            'contenido' => 'superaste la cantidad de caracteres permitidos'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $datosValidados = $request->except(['_token']);//ver estos campos si es que se pasa alguno
        $datosPorDefecto = [
            'idUsuario' => Auth::id(),
            'idEstadoPublicacion' => 1,
            'activo' => true
        ];
        $post = new Post();
        $post->fill(array_merge($datosValidados, $datosPorDefecto));

        Post::crearPost($post);
        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view('posteos/post_show',["post"=>Post::find($id)]);
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
    public function update(Request $request, $id):void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id):void
    {
        Post::bajaLogicaPost($id);
    }
}
