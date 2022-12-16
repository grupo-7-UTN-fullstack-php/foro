<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo_reporte extends ModeloBase
{
    protected $table = "motivo_reporte";
    protected $primaryKey = "idMotivo";
    protected $guarded = [];
    public $timestamps = false;

    public static function obtenerTodosLosMotivos(){
        return self::get();
    }

    use HasFactory;
}
