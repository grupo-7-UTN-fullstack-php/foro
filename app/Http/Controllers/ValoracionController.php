<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Models\Valoracion_comentario;
use App\Models\Valoracion_comentario_usuario;
use App\Models\Valoracion_post;
use App\Models\Valoracion_post_usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ValoracionController extends Controller
{


    public static function obtenerClase(string $publicacion,$clase1,$clase2){

        abort_if($publicacion != 'post' && $publicacion != 'comentario', '404');

        return ($publicacion == 'post') ? $clase1 : $clase2;
    }


    public static function obtenerClaseCantidad(string $publicacion)
    {
        return self::obtenerClase($publicacion, Valoracion_post::class, Valoracion_comentario::class);
    }

    public static function obtenerClaseUsuario(string $publicacion)
    {
        return self::obtenerClase($publicacion, Valoracion_post_usuario::class, Valoracion_comentario_usuario::class);
    }

    public static function obtenerModelo(Request $request, $clase){
        return $clase::nuevoModelo($request->input('idValoracion'), Auth::id(),$request->input('id'));
    }

    public static function guardarValoracion(Request $request){
        $publicacion = (string) $request->input('publicacion');
        $clase = self::obtenerClaseUsuario($publicacion);
        $valoracion = self::obtenerModelo($request,$clase);

        if(! $clase::existe($valoracion))
            $clase::agregarValoracion($valoracion);

        return self::cantidadValoracion($request->input('idValoracion'), $publicacion, $request->input('id'));

    }

    public static function cantidadValoracion($idValoracion, $publicacion , $idPublicacion){
        $clase = self::obtenerClaseCantidad($publicacion);
        return $clase::obtenerCantidadValoraciones($idValoracion,$idPublicacion);
    }

    public static function eliminarValoracion(Request $request){
        $clase = self::obtenerClaseUsuario($request->input('publicacion'));
        $valoracion = self::obtenerModelo($request,$clase);
        if($clase::existe($valoracion))
            $clase::eliminar($valoracion);
        return self::cantidadValoracion($request->input('idValoracion'), $request->input('publicacion'),$request->input('id'));
    }







}
