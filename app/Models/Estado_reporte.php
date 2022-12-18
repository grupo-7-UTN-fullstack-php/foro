<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_reporte extends ModeloBase
{
    protected $table = "estado_reporte";
    protected $primaryKey = "idEstadoReporte";
    protected $guarded = [];
    public $timestamps = false;

    public static function todosLosEstados(){
        return self::get();
    }
    public static function nombreDe($idEstadoReporte){
        return self::where('idEstadoReporte','=',$idEstadoReporte)->first()->descripcion;
    }

    use HasFactory;
}
