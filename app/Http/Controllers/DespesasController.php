<?php

namespace App\Http\Controllers;

use App\Models\Despesas;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function index()
    {
        $despesas = Despesas::all();
        return view('despesas.index', compact('despesas'));
    }
}
