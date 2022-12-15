<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion_comentario extends ModeloBase
{
    protected $table = "notificacion_comentario";
    protected $primaryKey = "idNotificacion";
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    public static function guardar($idNotificacion, $idComentario){
        $notificacion = new Notificacion_post(['idNotificacion' => $idNotificacion, 'idComentario' => $idComentario]);
        $notificacion->save();
    }

}
