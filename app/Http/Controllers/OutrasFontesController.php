<?php

namespace App\Http\Controllers;

use App\Models\OutrasFontes;
use App\Models\FonteDeRecurso;
use Illuminate\Http\Request;

class OutrasFontesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outras_fontes = OutrasFontes::all();
        $fonte_de_recurso = [];

        if ($outras_fontes->isEmpty()) {

            $outras_fontes = FonteDeRecurso::where('tipofonte','<>',1)->get();
            $fonte_de_recurso = $outras_fontes;

        } else {
            
            // Se $outras_fontes não estiver vazio, você pode continuar com o loop.
            foreach ($outras_fontes as $outra_fonte) {
                $fonte_de_recurso = FonteDeRecurso::where('tipofonte', $outra_fonte->tipofonte)->get();
            }
        }


        return response()->view('outras_fontes', ['outras_fontes' => $outras_fontes,'fonte_de_recurso' => $fonte_de_recurso]);
    }

    public function cadastrarOutrasFontes (Request $request) {

        $outras_fontes = new OutrasFontes;
        $outras_fontes->valor = $request->valor;
        $outras_fontes->data = $request->data;
        $outras_fontes->tipofonte = 2;
        $outras_fontes->save();
        if ($outras_fontes->save()) {
            return redirect('/outras_fontes')->with('msg', 'Salário de recurso cadastrada com sucesso!');
        }

    }
}
