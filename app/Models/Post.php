<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use LaravelIdea\Helper\App\Models\_IH_Post_C;

class Post extends ModeloBase
{
    protected $guarded = [];

    protected string $titulo = "";
    protected string $contenido = "";
    protected int $activo;
    protected int $cant_comentarios;
    protected int $visitas;
    protected int $idUsuario;
    protected string $usuario;
    protected int $idEstadoPublicacion;


    /**
     * @throws ValidationException
     */
    public static function crearPost(\Request $request): void
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
            'activo' => true,
            'cant_comentarios' => 0,
            'visitas' => 0
        ];
        $post = new Post();
        $post->fill(array_merge($datosValidados, $datosPorDefecto));
        $post->save();
    }

    public static function obtenerCamposTabla(): array
    {
        return self::getColumns();
    }

    public static function obtenerTodosLosPosts()
    {
        return self::join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();
    }

    public static function obtenerPostsDeUnUsuario(int $id)
    {
        return self::find($id)->get();
    }

    public static function incrementarCantidadComentariosPost(Post $post)
    {
        $post->increment('cant_comentarios');
        $post->save();
    }

    public static function decrementarCantidadComentariosPost(Post $post)
    {
        $post->decrement('cant_comentarios');
        $post->save();
    }

    public static function borrarPostDefinitivamente(Post $post)
    {
        $unPost = self::find($post);
        $unPost->delete();
    }

    protected $table = "post";
    protected $primaryKey = "idPost";

    use HasFactory;
}
