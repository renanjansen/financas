@extends('layouts.app_default')

@section('content')
    <div class="justify-content-center text-center p-3">
        <h1>Cadastro de Salários</h1>
        <form method="POST" action="{{ route('cadastrarSalarios') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name='valor'>
                <span class="input-group-text">.00</span>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="date" name='data'>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Salário</button>
        </form>

    </div>
@endsection
