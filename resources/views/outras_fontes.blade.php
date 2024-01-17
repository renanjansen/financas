@extends('layouts.app_default')

@section('content')
    <div class="justify-content-center text-center p-3">
        <h1>Cadastro de Salários</h1>
        <form method="POST" action="{{ route('cadastrarOutrasFontes') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name='valor'>
                <span class="input-group-text">.00</span>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Fonte de recurso">
                    <option selected>Selecione a fonte de recurso</option>
                        @foreach ($fonte_de_recurso as $fonte)
                            <option value="{{ $fonte->id }}"> {{ $fonte->fonte_de_recurso }}</option>
                        @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="date" name='data'>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar rendimentos de fonte</button>
        </form>

    </div>
@endsection
