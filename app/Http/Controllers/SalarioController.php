<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalarioRequest;
use App\Http\Requests\UpdateSalarioRequest;
use App\Models\Salarios;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalarioController extends Controller
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

        $salarios = Salarios::all();

        return response()->view('salario', ['salario' => $salarios]);
    }

    public function cadastrarSalarios (Request $request) {

        $salarios = new Salarios;
        $salarios->valor = $request->valor;
        $salarios->data = $request->data;
        $salarios->tipofonte = 1;
        $salarios->save();
        if ($salarios->save()) {
            return redirect('/salario')->with('msg', 'Salário de recurso cadastrada com sucesso!');
        }

    }
}
