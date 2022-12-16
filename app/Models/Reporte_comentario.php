<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte_comentario extends ModeloBase
{
    protected $table = "reporte_comentario";
    protected $primaryKey = "idReporte";
    protected $guarded = [];
    public $timestamps = false;

    use HasFactory;
}
