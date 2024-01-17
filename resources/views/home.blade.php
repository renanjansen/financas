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
        <div class="row row-cols-2" id="meu_dash">
            @include('components.grafico_receitas')
            @include('components.grafico_despesas')
        </div>
    </div>
@endsection
