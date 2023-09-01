@extends('layouts.app')
<style>

    .background-div {
        background-image: url('https://cdn.pixabay.com/photo/2016/04/20/08/21/entrepreneur-1340649_1280.jpg');
        /* Substitua pelo caminho correto para a sua imagem */
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        /* Isso faz com que a div ocupe toda a altura da tela */
    }
</style>

@section('content')
    <div class="container-fluid text-center background-div">
        <div class="row row-cols-2">
            <div class="card col">
                <div class="btn-group dropdown">
                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Receitas <i class="bi bi-cash-coin"></i></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('fonte_de_recurso') }}">Cadastrar fonte</a></li>
                        <li><a class="dropdown-item" href="#">Salário</a></li>
                        <li><a class="dropdown-item" href="#">Outras fontes de renda</a></li>
                    </ul>
                </div>
                <div id="pop_div">
                    {!! $grafico !!}
                </div>
            </div>

            <div class="card col">
                <div class="btn-group dropdown">
                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Despesas <i class="bi bi-calculator-fill"></i></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/">Moradia</a></li>
                        <li><a class="dropdown-item" href="#">Alimentação</a></li>
                        <li><a class="dropdown-item" href="#">Transporte</a></li>
                        <li><a class="dropdown-item" href="#">Saúde</a></li>
                        <li><a class="dropdown-item" href="#">Educação</a></li>
                        <li><a class="dropdown-item" href="#">Lazer</a></li>
                        <li><a class="dropdown-item" href="#">Dívidas e empréstimos</a></li>
                    </ul>
                </div>
            </div>




        </div>
    </div>
@endsection
