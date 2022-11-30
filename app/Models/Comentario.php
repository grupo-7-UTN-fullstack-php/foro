<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends ModeloBase
{
    protected $guarded = [];
    protected $table = "comentario";
    protected $primaryKey = "idComentario";
    protected int $idUsuario;
    protected int $idPost;
    protected int $idEstadoPublicacion;
    protected int $activo;
    protected string $contenido;

    use HasFactory;
    public static function crearComentario(Comentario $comentario): void
    {
        $comentario->save();
    }
    public static function obtenerTodosLosComentarios($idPost){
        return self::where('comentario.idPost', '=', $idPost)->
        join('usuario', 'usuario.idUsuario', '=', 'comentario.idUsuario')->get();
    }

}
