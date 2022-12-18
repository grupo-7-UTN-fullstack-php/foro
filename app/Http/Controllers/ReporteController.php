<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reporte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReporteController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if(Auth::check()) {

            $reglas = [
                'idMotivo' => ['required','integer'],
                'idReportado' => ['required','integer'],
                'explicacion' => ['required', 'min:10'],
            ];
            $mensajes = [
                'idMotivo' => 'Debe seleccionar alguna de las opciones',
                'explicacion' => 'Debe ser mayor a 10 caracteres',
            ];

            Validator::make($request->all(), $reglas, $mensajes)->validate();
            $datosValidados = $request->except(['_token','publicacion','idPublicacion']);//ver estos campos si es que se pasa alguno

            $reporte = new Reporte();

            $datosPorDefecto = [
                'idReportante' => Auth::id(),
                'idEstadoReporte' => 1,
            ];
            $reporte->fill(array_merge($datosValidados, $datosPorDefecto));
            $reporte->guardar();
            $reporte->asociarPublicacion($request->input('publicacion'), $request->input('idPublicacion'));

        }
        return to_route('misReportes');
    }

    public function mostrarReportesDelUsuario(){
        return view('/reportes/misReportes',['reportes'=>Reporte::reportesDeUnUsuario(Auth::id())]);
    }

}
