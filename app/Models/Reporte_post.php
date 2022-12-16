<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte_post extends ModeloBase
{
    protected $table = "reporte_post";
    protected $primaryKey = "idReporte";
    protected $guarded = [];
    public $timestamps = false;

    use HasFactory;
}
