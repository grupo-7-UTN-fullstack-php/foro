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

    use HasFactory;
}
