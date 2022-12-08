<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion_comentario extends ModeloBase
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "valoracion_comentario";
    protected $primaryKey = "idValoracion";

    public static function obtenerCantidadTodasValoraciones($idComentario){

        $respuesta = []; //array asociativo valoraciones["idComentario"] = cantidadValoraciones
        $valoraciones =  self::where('idComentario','=',$idComentario)->select('idValoracion','cantidad')->get();

        if(!empty($valoraciones)){
            foreach($valoraciones as $valoracion){
                //$respuesta[$valoracion->idValoracion] = (empty($valoracion->cantidad)) ? 0 : $valoracion->cantidad;
                $respuesta[$valoracion->idValoracion] = $valoracion->cantidad;
            }
        }
        return $respuesta;
    }

    public static function obtenerCantidadValoraciones($idValoracion,$idComentario){
        $valoracion = self::select('cantidad')
                    ->where('idValoracion','=',$idValoracion)
                    ->where('idComentario','=',$idComentario)
                    ->first();
        return (is_null($valoracion)) ? 0 : $valoracion->cantidad;
    }

    public static function agregarValoracion($idValoracion,$idComentario)
    {
        Valoracion_comentario::firstOrCreate(
            ['idValoracion' => $idValoracion,
                'idComentario' => $idComentario
            ],
            ['idValoracion' => $idValoracion,
                'idComentario' => $idComentario,
                'cantidad' => 0]
        );
        self::aumentarCantidad($idValoracion, $idComentario);
    }

    public static function aumentarCantidad($idValoracion,$idComentario){
        self::where('idValoracion','=',$idValoracion)
            ->where('idComentario','=',$idComentario)->increment('cantidad');
    }

    public static function disminuirCantidad($idValoracion,$idComentario){
        self::where('idValoracion','=',$idValoracion)
            ->where('idComentario','=',$idComentario)->decrement('cantidad');
    }

    use HasFactory;
}
