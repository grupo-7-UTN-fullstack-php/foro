<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Valoracion_post extends ModeloBase
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "valoracion_post";
    protected $primaryKey = "idValoracion";
    public $timestamps = false;


    public static function obtenerCantidadTodasValoraciones($idPost)
    {

        $respuesta = []; //array asociativo valoraciones["idValoracion"] = cantidadValoraciones
        $valoraciones = self::where('idPost', '=', $idPost)->select('idValoracion', 'cantidad')->get();

        if (!empty($valoraciones)) {
            foreach ($valoraciones as $valoracion) {
                //$respuesta[$valoracion->idValoracion] = (empty($valoracion->cantidad)) ? 0 : $valoracion->cantidad;
                $respuesta[$valoracion->idValoracion] = $valoracion->cantidad;
            }
        }
        return $respuesta;
    }

    public static function obtenerCantidadValoraciones($idValoracion, $idPost): int
    {
        $valoracion = self::select('cantidad')
            ->where('idValoracion', '=', $idValoracion)
            ->where('idPost', '=', $idPost)
            ->first();
        return (is_null($valoracion)) ? 0 : $valoracion->cantidad;
    }

    public static function agregarValoracion($idValoracion, $idPost)
    {
        Valoracion_post::firstOrCreate(
            ['idValoracion' => $idValoracion,
                'idPost' => $idPost
            ],
            ['idValoracion' => $idValoracion,
                'idPost' => $idPost,
                'cantidad' => 0]
        );
        self::aumentarCantidad($idValoracion, $idPost);
    }

    public static function aumentarCantidad($idValoracion, $idPost)
    {
        self::where('idValoracion', '=', $idValoracion)
            ->where('idPost', '=', $idPost)->increment('cantidad');
    }

    public static function disminuirCantidad($idValoracion, $idPost)
    {
        self::where('idValoracion', '=', $idValoracion)
            ->where('idPost', '=', $idPost)->decrement('cantidad');
    }
}
