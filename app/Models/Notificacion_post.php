<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion_post extends ModeloBase
{
    protected $table = "notificacion_comentario";
    protected $primaryKey = "idNotificacion";
    protected $guarded = [];
    public $timestamps = false;

    public static function guardar($idNotificacion, $idPost){
        $notificacion = new Notificacion_post(['idNotificacion' => $idNotificacion, 'idPost' => $idPost]);
        $notificacion->save();
    }
    use HasFactory;
}
