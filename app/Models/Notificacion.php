<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends ModeloBase
{
    protected $table = "notificacion";
    protected $primaryKey = "idNotificacion";
    protected $guarded = [];
    const UPDATED_AT = null;

    public static function obtenerNotificacionesDeUsuario($idUsuario){
        return self::where('idUsuario',$idUsuario)
                    ->leftJoin('notificacion_post','notificacion.idNotificacion','=','notificacion_post.idNotificacion')
                    ->leftJoin('notificacion_comentario','notificacion_comentario.idNotificacion','=','notificacion_comentario.idNotificacion')
                    ->select('notificacion.*','notificacion_post.idPost','notificacion_comentario.idComentario')
                    ->get();
    }

    public function asociarPost($idPost){
        Notificacion_post::guardar($this->idNotificacion, $idPost);
    }

    public function asociarComentario($idComentario){
        Notificacion_comentario::guardar($this->idNotificacion, $idComentario);
    }

    public function guardar(){
        $this->save();
    }


    use HasFactory;
}
