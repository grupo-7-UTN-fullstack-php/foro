<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion_post extends ModeloBase
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "valoracion_post";
    protected $primaryKey = "idValoracion";
    public $timestamps = false;

    public static function obtenerCantidadValoraciones($idValoracion,$idPost): int{
        $valoracion = self::select('cantidad')
            ->where('idValoracion','=',$idValoracion)
            ->where('idPost','=',$idPost)
            ->first();
        return (is_null($valoracion)) ? 0 : $valoracion->cantidad;
    }
    public static function agregarValoracion($idValoracion,$idPost)
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

    public static function aumentarCantidad($idValoracion,$idPost){
        self::where('idValoracion','=',$idValoracion)
            ->where('idPost','=',$idPost)->increment('cantidad');
    }

    public static function disminuirCantidad($idValoracion,$idPost){
        self::where('idValoracion','=',$idValoracion)
            ->where('idPost','=',$idPost)->decrement('cantidad');
    }
}
