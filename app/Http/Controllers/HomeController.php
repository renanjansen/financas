<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Salarios;
use App\Models\OutrasFontes;

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
        $outras_fontes = OutrasFontes::orderBy('data', 'asc')->get();

        $dataTable = $lava->DataTable();
        $dataTable->addDateColumn('Date')->addNumberColumn('Salários')->addNumberColumn('Outras Receitas');

        foreach ($salarios as $salario) {
            $dataTable->addRow([$salario->data, $salario->valor, null]);
        }

        foreach ($outras_fontes as $outra_fonte) {
            $dataTable->addRow([$outra_fonte->data, null, $outra_fonte->valor]);
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
