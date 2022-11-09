<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return "hola mundo";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posteos/crearPost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $reglas = [

            'titulo' => ['required', 'alpha_num', 'min:2', 'max:45', 'unique:post'],
            'textarea' => ['required', 'alpha_num', 'min:2,max:255'],

        ];
        $mensajes = [
            'titulo' => 'algún mensaje a enviar',
            'textarea' => 'superaste la cantidad de caracteres permitidos'
        ];

        Validator::make($request->all(), $reglas, $mensajes)->validate();

        $datosValidados = $request->except([]);

        $nuevoUsuario = new Post;
        $nuevoUsuario->fill(array_merge($datosValidados));
        $nuevoUsuario->save();

        return "post creado con éxito";
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
