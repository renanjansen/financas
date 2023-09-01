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
        <button type="submit" class="btn btn-primary">Castrar fonte de recurso</button>
      </form>
      <div class="card justify-content-center text-center mt-4 p-3">
        <h2>Fontes de recursos cadastradas</h2>
        <ul class="list-group list-group-flush">
            @if ($fonte_de_recurso)
                @foreach ($fonte_de_recurso as $fonte)
                <li class="list-group-item"><strong> Fonte de recurso: </strong> {{ $fonte->fonte_de_recurso }}&nbsp;  <strong>Tipo de fonte: </strong> @if ($fonte->tipofonte == 1)
                    Salario
                @elseif ($fonte->tipofonte == 2)
                    Outras fontes de renda</li>
                @endif
                @endforeach
            @else
            <li class="list-group-item">Sem fontes cadastradas</li>
            @endif

        </ul>
      </div>
</div>


@endsection

