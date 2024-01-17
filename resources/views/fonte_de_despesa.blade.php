@extends('layouts.app_default')

@section('content')
<div class="justify-content-center text-center p-3">
    <h1>Cadastro de fontes de despesas</h1>
    <form method="POST" action="{{ route('cadastrarFonte') }}">
        @csrf
        <div class="mb-3">
          <label for="fonte" class="form-label">Nome da fonte de recurso (empresa)</label>
          <input type="text" class="form-control" id="fonte" aria-describedby="fonte_de_despesa" name="fonte_de_despesa" required>
        </div>
        <div class="mb-3">
            <select class="form-select" name="tipo_de_fonte" aria-label="Tipo de fonte" required>
                <option value=""  selected disabled>Tipo de fonte:</option>
                <option value="1">Moradia</option>
                <option value="2">Alimentação</option>
                <option value="3">Transporte</option>
                <option value="4">Saúde</option>
                <option value="5">Educação</option>
                <option value="6">Lazer</option>
                <option value="7">Dívidas e empréstimos</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Castrar fonte de recurso</button>
      </form>
      <div class="card justify-content-center text-center mt-4 p-3">
        <h2>Fontes de recursos cadastradas</h2>
        <ul class="list-group list-group-flush">
        @if ($fonte_de_despesa->count() > 0)
            <li class="list-group-item">Tem fontes cadastradas</li>
        @else
            <li class="list-group-item">Sem fontes cadastradas</li>
        @endif

        </ul>
      </div>
</div>


@endsection

