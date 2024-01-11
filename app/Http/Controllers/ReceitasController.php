<?php

namespace App\Http\Controllers;
use App\Models\Receitas;

use Illuminate\Http\Request;

class ReceitasController extends Controller
{
    public function index()
    {
        $receitas = Receitas::all();
        return view('receitas.index', compact('receitas'));
    }
}
