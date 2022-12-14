<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'imagen' => ['image']
        ];
        $mensajes = [
            'titulo' => 'mínimo 2 caracteres, máximo 45 o titulo repetido.',
            'contenido' => 'superaste la cantidad de caracteres permitidos.',
            'imagen' => 'ingrese una imágen válida.'
        ];
        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $datosValidados = $request->except(['_token']);//ver estos campos si es que se pasa alguno
        $post = new Post();
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
            'idUsuario' => Auth::id(),
            'idEstadoPublicacion' => 1,
            'activo' => true,
            'imagen' => $path
        ];
        $post->fill(array_merge($datosValidados, $datosPorDefecto));
        Post::guardarPost($post);
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
        return view('posteos/post_show', ["post" => Post::obtenerPost($id), "comentarios" => Comentario::obtenerTodosLosComentarios($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = Post::obtenerPost($id);
        return view("posteos/edit", ['titulo' => 'Editar post'], compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $post = Post::obtenerPost($id);
        $reglas = [
            'titulo' => ['required', 'min:2', 'max:45'],
            'contenido' => ['required', 'min:2,max:255'],

        ];
        $mensajes = [
            'titulo' => 'algún mensaje a enviar',
            'contenido' => 'superaste la cantidad de caracteres permitidos'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();
        $datosValidados = $request->except(['_token']);//ver estos campos si es que se pasa alguno
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
            $path = $post->imagen;
        }
        $datosPorDefecto = [
            'idUsuario' => $post->idUsuario,
            'idEstadoPublicacion' => 1,
            'activo' => true,
            'imagen' => $path
        ];
        $post = Post::obtenerPost($id);
        $post->fill(array_merge($datosValidados, $datosPorDefecto));
        Post::guardarPost($post);
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        Post::bajaLogicaPost($id);
        return back()->with('notification', 'post eliminado correctamente.');
    }

    public function restore(int $id)
    {
        Post::altaLogicaPost($id);
        return back()->with('notification', 'post recuperado correctamente.');
    }
}
