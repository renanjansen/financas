<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceitasController extends Controller
{
    public function index()
    {
        $receitas = \App\Models\Receitas::all();
        return view('receitas.index', compact('receitas'));
    }
}
