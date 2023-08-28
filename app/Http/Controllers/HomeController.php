<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

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
        $lava = new Lavacharts; // See note below for Laravel

        $receita = $lava->DataTable();

        $receita->addDateColumn('Date')
                ->addNumberColumn('Receita')
                ->addRow(['2023-01-01', 2940])
                ->addRow(['2023-02-01', 2870])
                ->addRow(['2023-03-01', 3100])
                ->addRow(['2023-04-01', 4234])
                ->addRow(['2023-05-01', 2598])
                ->addRow(['2023-06-01', 2512])
                ->addRow(['2023-07-01', 2942])
                ->addRow(['2023-08-01', 3200])
                ->addRow(['2023-09-01', 4345])
                ->addRow(['2023-10-01', 3250])
                ->addRow(['2023-11-01', 5100])
                ->addRow(['2023-12-01', 4907]);

        $lava->AreaChart('receita', $receita, [
            'title' => 'Registros de receitas',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return $lava->render('AreaChart', 'receita', 'pop_div');



    }
}
