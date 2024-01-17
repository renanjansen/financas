<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\FonteDeDespesas;

class FonteDeDespesasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fonte_de_despesa = FonteDeDespesas::all();

        return view('fonte_de_despesa', ['fonte_de_despesa' => $fonte_de_despesa]);

    }
    public function cadastrarFonte (Request $request) {

        $fonte_de_despesa = new FonteDeDespesas;
        $fonte = strtoupper(  $request->fonte_de_despesa );
        dd($request);
        $tipofonte = $request->tipo_de_fonte;
        $fonte_de_despesa->fonte_de_despesa = $fonte;
        $fonte_de_despesa->tipofonte = $tipofonte;
        $fonte_de_despesa->save();
        if ($fonte_de_despesa->save()) {
            return redirect('/fonte_de_despesa')->with('msg', 'Fonte de despesa cadastrada com sucesso!');
        }

    }
}
