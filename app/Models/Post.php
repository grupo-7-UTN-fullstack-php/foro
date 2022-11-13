<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\ValidationException;

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
    public static function crearPost(Post $post): void
    {
        $post->save();
    }

    public static function obtenerTodosLosPosts()
    {
        return self::join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();
    }

    public static function obtenerPostsDeUnUsuario(int $id)
    {
        return self::where('post.idUsuario', '=', $id)->join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();
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
