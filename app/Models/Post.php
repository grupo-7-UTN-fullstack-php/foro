<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends ModeloBase
{
    protected $guarded = [];

    protected string $titulo = "";
    protected string $contenido = "";
    protected int $activo;
    protected int $cant_comentarios;
    protected int $visitas;
    //protected int $idUsuario;
    //protected int $idEstadoPublicacion;


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

    public static function obtenerTodosLosPosts(): array
    {
        return self::all();
    }

    public static function obtenerCreadorPost(Post $post): array
    {
        return self::select('post.usuario')
            ->join('usuario', 'post.idUsuario', '=', 'usuario.idUsuario')
            ->get()->where($id = 'usuario.idUsuario');
    }

    public static function incrementarCantidadComentariosPost(Post $post)
    {
        $unPost = Self::find($post);
        ++$unPost->cant_comentarios;
        $unPost->save();
    }

    public static function decrementarCantidadComentariosPost(Post $post)
    {
        $unPost = Self::find($post);
        --$unPost->cant_comentarios;
        $unPost->save();
    }

    protected $table = "post";
    protected $primaryKey = "idPost";

    use HasFactory;
}
