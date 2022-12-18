<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo_reporte extends ModeloBase
{

    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = "motivo_reporte";
    protected $primaryKey = "idMotivo";


    public static function obtenerTodosLosMotivos(){
        return self::get();
    }

    public static function motivoDe($idMotivo){
        return self::where('idMotivo', '=',$idMotivo)->first()->motivo;
    }


}
