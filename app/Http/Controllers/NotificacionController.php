<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function notificacionesUsuario($idUsuario){
        Notificacion::obtenerNotificacionesDeUsuario($idUsuario);
    }
}
