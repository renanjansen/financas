<div class="card col">
    <div class="btn-group dropdown">
        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Receitas <i
                class="bi bi-cash-coin"></i></button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('fonte_de_recurso') }}">Cadastrar fonte</a></li>
            <li><a class="dropdown-item" href="{{ route('salario') }}">Registrar Salários</a></li>
            <li><a class="dropdown-item" href="{{ route('outras_fontes') }}">Outras fontes de renda</a></li>
        </ul>
    </div>
    <div id="receitas_div" class="bg-transparent" style="width: 100%; height: 200px;">
        {!! $grafico_receitas !!}
    </div>
</div>
