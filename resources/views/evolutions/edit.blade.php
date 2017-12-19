@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <form method="POST" action="{{ route('evolucao.update', $evolution->id) }}">

          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">

          <div class="text-muted"><h5>Para: {{ $evaluation->name }}</h5></div>
          <h3 class="mt-3">Evolução</h3>
          <input type="hidden" name="evaluation_id" value="{{ request()->get('evaluation') }}" required>

          <div class="form-group row">
            <div class="col-md-3">
              <label for="evolution-date">Data da evolução</label>
              <input type="text" name="evolution_date" class="form-control" id="evolution-date" value="{{ brDate(old('evolution_date', $evolution->evolution_date)) }}" required>
            </div>

            <div class="col-md-9">
              <label for="description">Descrição</label>
              <textarea rows="1" class="form-control" id="description" name="description" required>{{ old('description', $evolution->description) }}</textarea>
            </div>

            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary btn-lg mt-5 px-5">Salvar</button>
              <a href="#" id="delete" class="btn btn-danger btn-lg mt-5 ml-4 px-5">Deletar</a>
              <a href="{{ route('avaliacao.edit', request()->get('evaluation')) . '#ev-' . $evolution->id }}" class="btn btn-link mt-5 ml-4">Voltar</a>
            </div>
          </div>
        </form>
        <form action="{{ route('evolucao.destroy', [$evolution->id, 'evaluation' => request()->get('evaluation')]) }}" method="POST" id="delete-form" style="display: none">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>

@endsection
