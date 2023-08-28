<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FonteDeRecursoController extends Controller
{
    public function index()
    {
        $fonte_de_recurso = \App\Models\fonte_de_recurso::all();
        return view('fonte_de_recurso');
    }
}
