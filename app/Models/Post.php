<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends ModeloBase
{
    protected $guarded = [];

    /*protected string $titulo = "";
    protected string $contenido = "";
    protected int $activo;
    protected int $cant_comentarios;
    protected int $visitas;
    protected int $idUsuario;
    protected int $idEstadoPublicacion;*/


    function guardar(\Request $request)
    {
        $this->titulo = $request->input('titulo');
        $this->contenido = $request->input('textarea');
        $this->save();
    }


    protected $table = "post";
    protected $primaryKey = "idPost";

    use HasFactory;
}
