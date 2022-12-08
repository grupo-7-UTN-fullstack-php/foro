<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Post extends ModeloBase
{
    protected $guarded = [];

    protected string $titulo = "";
    protected string $contenido = "";
    protected int $activo;
//    protected int $cant_comentarios;
    protected int $visitas;
    protected int $idUsuario;
    protected string $usuario;
    protected int $idEstadoPublicacion;
    public $valoraciones = null;


    /**
     * @throws ValidationException
     */
    public static function crearPost(Post $post): void
    {
        $post->save();
    }

    public static function obtenerPost(int $id)
    {
        $post = self::where('post.idPost', '=', $id)->
        join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->first();
        $post->valoraciones = Valoracion_post::obtenerCantidadTodasValoraciones($post->idPost);
        return $post;
    }

    public static function obtenerTodosLosPosts()
    {

        $posts = self::join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();

        foreach($posts as $post){
            $post->valoraciones = Valoracion_post::obtenerCantidadTodasValoraciones($post->idPost);
        }

        return $posts;

    }

    public static function obtenerPostsDeUnUsuario(int $id)
    {
        return self::where('post.idUsuario', '=', $id)->
        join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();
    }

    public static function incrementarCantidadComentariosPost(Post $post): void
    {
        $post->increment('cant_comentarios');
        $post->save();
    }

    public static function decrementarCantidadComentariosPost(Post $post): void
    {
        $post->decrement('cant_comentarios');
        $post->save();
    }

    public static function borrarPostDefinitivamente(Post $post): void
    {
        $unPost = self::find($post);
        $unPost->delete();
    }

    public static function bajaLogicaPost(int $id): void
    {
        $unPost = self::find($id);
        $unPost->activo = false;
        $unPost->save();

    }

    protected $table = "post";
    protected $primaryKey = "idPost";

    use HasFactory;
}
