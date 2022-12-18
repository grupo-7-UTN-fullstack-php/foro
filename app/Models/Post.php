<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\ValidationException;


class Post extends ModeloBase
{
    use SoftDeletes;

    protected $guarded = [];
    protected string $titulo = "";
    protected string $contenido = "";
    protected int $activo;
    protected int $visitas;
    protected int $idUsuario;
    protected string $usuario;
    protected int $idEstadoPublicacion;
    public $valoraciones = null;
//    public string $imagen = "";
    protected $table = "post";
    protected $primaryKey = "idPost";
//    protected $fillable=['imagen'];


    /**
     * @throws ValidationException
     */
    public static function guardarPost(Post $post): void
    {
        $post->save();
//        dd($post->imagen);
    }

    public static function obtenerPost($id)
    {
        $post = self::where('post.idPost', $id)
            ->join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')
            ->select('post.*','usuario.idUsuario','usuario.usuario','usuario.idEstado','usuario.idRol')
            ->first();
        $post->valoraciones = Valoracion_post::obtenerCantidadTodasValoraciones($post->idPost);
//        dd($post->imagen);
        return $post;
    }

    public static function obtenerUsuarioCreador($id)
    {
        return self::obtenerPost($id)->idUsuario;
    }

    public static function obtenerTodosLosPosts()
    {

        $posts = self::join('usuario', 'usuario.idUsuario', '=', 'post.idUsuario')->get();

        foreach ($posts as $post) {
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

    public static function bajaLogicaPost(int $id)
    {
        $unPost = self::obtenerPost($id);
        $unPost->runSoftDelete();
        $unPost->activo = false;
        $unPost->save();

    }

    public static function altaLogicaPost(int $id)
    {
        $unPost = self::obtenerPost($id);
        $unPost->restore();
        $unPost->activo = true;
        $unPost->save();
    }


    use HasFactory;
}
