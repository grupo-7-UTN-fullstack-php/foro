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

    use HasFactory;
}
