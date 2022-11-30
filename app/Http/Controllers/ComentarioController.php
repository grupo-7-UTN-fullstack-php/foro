<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    protected $table = "comentario";
    protected $primaryKey = "idComentario";
    protected $contenido;
    protected $idPost;
    protected $idUsuario;
    protected $estadoPublicacion;
    protected $activo;
    protected $guarded = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $reglas = [
                'contenido' => ['required', 'min:10']
            ];
            $mensajes = [
                'contenido' => 'El comentario debe tener 10 o más caracteres'
            ];
            Validator::make($request->all(), $reglas, $mensajes)->validate();
            $datosValidados = $request->except(['_token']);//ver estos campos si es que se pasa alguno
            $datosPorDefecto = [
                'idUsuario' => Auth::id(),
                'idEstadoPublicacion' => 1,
                'activo' => true
            ];
            $comentario = new Comentario();
            $comentario->fill(array_merge($datosValidados, $datosPorDefecto));

            Comentario::crearComentario($comentario);
            return to_route('post.show', $request->get("idPost"));
        }
        else {
            return to_route('post.show', $request->get("idPost"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
