<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Salarios;
use App\Models\OutrasFontes;
use App\Models\Despesas;

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
        $grafico_receitas = $this->grafico_receitas();
        $grafico_despesas = $this->grafico_despesas();

        //dd($grafico_receitas);
        return view('home', [
            'grafico_receitas' => $grafico_receitas,
           'grafico_despesas'  => $grafico_despesas
        ]);
    }

    public function grafico_receitas()
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

        return $lava->render('AreaChart', 'receita', 'receitas_div');
    }

    public function grafico_despesas()
    {
        $lava = new Lavacharts;

        // ORDENANDO A BUSCA POR DATA
        $despesas = Despesas::all();


        $dataTable = $lava->DataTable();
        $dataTable->addDateColumn('Data')->addNumberColumn('Salários');

        foreach ($despesas as $despesa) {
            $dataTable->addRow([$despesa->data, $despesa->valor, null]);
        }



        $chartOptions = [
            'title' => 'Registros de Despesas',
            'legend' => [
                'position' => 'in'
            ]
        ];

        $lava->AreaChart('despesa', $dataTable, $chartOptions);
        // $lava->render('AreaChart', 'despesa', 'despesas_div')

        return $dataTable->toJson();
    }


}
