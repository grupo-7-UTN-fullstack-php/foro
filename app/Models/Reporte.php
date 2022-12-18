<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends ModeloBase
{
    protected $table = "reporte";
    protected $primaryKey = "idReporte";
    protected $guarded = [];

    public function guardar(){
        $this->save();
    }

    public function asociarPublicacion($publicacion,$idPublicacion){
        $reportePost = null;
        if($publicacion == 'post'){
            $reportePost = new Reporte_post();
            $reportePost->idPost = $idPublicacion;

        }
        else{
            $reportePost = new Reporte_comentario();
            $reportePost->idComentario = $idPublicacion;
        }
        $reportePost->idReporte = $this->idReporte;
        $reportePost->save();
    }

    public static function reportesDeUnUsuario($idUsuario){
        return self::where('reporte.idReportante','=',$idUsuario)
                    ->leftJoin('reporte_comentario','reporte_comentario.idReporte','=','reporte.idReporte')
                    ->leftJoin('reporte_post','reporte_post.idReporte','=','reporte.idReporte')
                    ->select('reporte.*','reporte_comentario.idComentario','reporte_post.idPost')
                    ->get();
    }

    public static function todosLosReportes(){
        return self::leftJoin('reporte_comentario','reporte_comentario.idReporte','=','reporte.idReporte')
            ->leftJoin('reporte_post','reporte_post.idReporte','=','reporte.idReporte')
            ->select('reporte.*','reporte_comentario.idComentario','reporte_post.idPost')
            ->get();
    }

    public static function obtenerReporte($idReporte){
        return self::find($idReporte);
    }

    use HasFactory;
}
