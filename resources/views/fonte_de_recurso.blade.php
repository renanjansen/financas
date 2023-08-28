@extends('layouts.app')

@section('content')
<div class="justify-content-center text-center p-3">
    <h1>Cadastro de fontes de recursos</h1>
    <form>
        <div class="mb-3">
          <label for="fonte" class="form-label">Nome da fonte de recurso</label>
          <input type="text" class="form-control" id="fonte" aria-describedby="fonte_de_recurso" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection

