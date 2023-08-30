@extends('layouts.app')

@section('content')
<div class="justify-content-center text-center p-3">
    <h1>Cadastro de fontes de recursos</h1>
    <form method="POST" action="{{ route('cadastrarFonte') }}">
        @csrf
        <div class="mb-3">
          <label for="fonte" class="form-label">Nome da fonte de recurso (empresa)</label>
          <input type="text" class="form-control" id="fonte" aria-describedby="fonte_de_recurso" name="fonte_de_recurso" required>
        </div>
        <div class="mb-3">
            <select class="form-select" name="tipo_de_fonte" aria-label="Tipo de fonte" required>
                <option value=""  selected disabled>Tipo de fonte:</option>
                <option value="1">Salario</option>
                <option value="2">Outras fontes de renda</option>
            </select>
        </div>
        <label for="valor" class="form-label">Valor: </label>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input id="valor" class="form-control" aria-label="Amount (to the nearest dollar)" name="valor" type="number" step="0.01" pattern="[0-9]+(\.[0-9]+)?" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div class="card justify-content-center text-center mt-4 p-3">
        <ul class="list-group list-group-flush">
            @if ($fonte_de_recurso)
                @foreach ($fonte_de_recurso as $fonte)
                <li class="list-group-item">Fonte: {{ $fonte->fonte_de_recurso }} Rendimento: R$: {{ $fonte->valor }}</li>
                @endforeach
            @else
            <li class="list-group-item">Sem fontes cadastradas</li>
            @endif

        </ul>
      </div>
</div>


@endsection

