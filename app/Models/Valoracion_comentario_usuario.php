<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Valoracion_comentario_usuario extends ModeloBase
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "valoracion_comentario_usuario";


    public static function obtenerQuery($idValoracion, $idUsuario, $idComentario){
        return self::where('idValoracion','=',$idValoracion)
                    ->where('idUsuario','=',$idUsuario)
                    ->where('idComentario','=',$idComentario);
    }

    public static function nuevoModelo($idValoracion, $idUsuario, $idComentario){
        return new self([
            'idValoracion' => $idValoracion,
            'idUsuario' => $idUsuario,
            'idComentario' => $idComentario
        ]);
    }

    public static function existe($valoracion){
        return self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idComentario)->exists();
    }
    public static function encontrar($valoracion){
        return self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idComentario)->first();
    }

    public static function agregarValoracion($valoracion){
        Valoracion_comentario::agregarValoracion($valoracion->idValoracion, $valoracion->idComentario);
        $valoracion->save();
    }
    public static function eliminar($valoracion){
        self::obtenerQuery($valoracion->idValoracion, $valoracion->idUsuario, $valoracion->idComentario)->delete();
        Valoracion_comentario::disminuirCantidad($valoracion->idValoracion,$valoracion->idComentario);
    }

    use HasFactory;
}
