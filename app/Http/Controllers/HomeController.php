<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Salarios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grafico = $this->grafico();
        return view('home', ['grafico' => $grafico]);
    }

    public function grafico()
    {
        $lava = new Lavacharts;

        // ORDENANDO A BUSCA POR DATA
        $salarios = Salarios::orderBy('data', 'asc')->get();

        $dataTable = $lava->DataTable();
        $dataTable->addDateColumn('Date')->addNumberColumn('Receita');

        foreach ($salarios as $salario) {
            $dataTable->addRow([$salario->data, $salario->valor]);
        }

        $chartOptions = [
            'title' => 'Registros de Receitas',
            'legend' => [
                'position' => 'in'
            ]
        ];

        $lava->AreaChart('receita', $dataTable, $chartOptions);

        return $lava->render('AreaChart', 'receita', 'pop_div');
    }
}
