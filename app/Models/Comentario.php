<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends ModeloBase
{
    protected $table = "comentario";
    protected $primaryKey = "idComentario";
    use HasFactory;
    public static function obtenerTodosLosComentarios($idPost){
        return self::where('comentario.idPost', '=', $idPost)->
        join('usuario', 'usuario.idUsuario', '=', 'comentario.idUsuario')->get();
    }

}
