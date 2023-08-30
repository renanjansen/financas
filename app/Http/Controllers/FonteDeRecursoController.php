<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fonte_de_recurso;

class FonteDeRecursoController extends Controller
{
    public function index()
    {
        $fonte_de_recurso = \App\Models\fonte_de_recurso::all();

        return view('fonte_de_recurso', ['fonte_de_recurso' => $fonte_de_recurso]);

    }
    public function cadastrarFonte (Request $request) {

        $fonte_de_recurso = new fonte_de_recurso;
        $fonte = strtoupper(  $request->fonte_de_recurso );
        $valor = $request->valor;
        $tipofonte = $request->tipo_de_fonte;
        $fonte_de_recurso->fonte_de_recurso = $fonte;
        $fonte_de_recurso->tipofonte = $tipofonte;
        $fonte_de_recurso->valor = $valor;
        $fonte_de_recurso->save();
        if ($fonte_de_recurso->save()) {
            return redirect('/fonte_de_recurso')->with('msg', 'Fonte de recurso cadastrada com sucesso!');
        }

    }
}
