<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends ModeloBase
{
    protected $guarded = [];
    protected $table = "valoracion";
    protected $primaryKey = "idValoracion";
    protected string $descripcionValoracion;

    use HasFactory;
}
