<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Valoracion_post_usuario extends ModeloBase
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = "valoracion_post_usuario";


    public static function obtenerQuery($idValoracion, $idUsuario, $idPost){
        return self::where('idValoracion','=',$idValoracion)
            ->where('idUsuario','=',$idUsuario)
            ->where('idPost','=',$idPost);
    }

    public static function existe($valoracion){
        return self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idPost)->exists();
    }


    public static function encontrar($valoracion){
        return self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idPost)->first();
    }

    public static function nuevoModelo($idValoracion, $idUsuario, $idPost){
        return new self([
            'idValoracion' => $idValoracion,
            'idUsuario' => $idUsuario,
            'idPost' => $idPost
        ]);
    }


    public static function agregarValoracion($valoracion){
        Valoracion_post::agregarValoracion($valoracion->idValoracion, $valoracion->idPost);
        $valoracion->save();
        $post = Post::obtenerPost($valoracion->idPost);
        $notificacion = new Notificacion();
        $notificacion->titulo = 'A @'.Auth::user()->usuario.' le ha gustado tu post';
        $notificacion->descripcion = 'A @'.Auth::user()->usuario.' ha reaccionado a "'.$post->titulo.'"';
        $notificacion->idUsuario = $post->idUsuario;
        $notificacion->guardar();
        $notificacion->asociarPost($post->idPost);
    }

    public static function eliminar($valoracion){
        self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idPost)->delete();
        Valoracion_post::disminuirCantidad($valoracion->idValoracion,$valoracion->idPost);
    }

}
