@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <form method="POST" action="{{ route('evolucao.store') }}">
          {{ csrf_field() }}
          <div class="text-muted"><h5>Para: {{ $evaluation->name }}</h5></div>
          <h3 class="mt-3">Evolução</h3>
          <input type="hidden" name="evaluation_id" value="{{ request()->get('evaluation') }}" required>

          <div class="form-group row">
            <div class="col-md-3">
              <label for="evolution-date">Data da evolução</label>
              <input type="text" name="evolution_date" class="form-control" id="evolution-date" value="{{ old('evolution_date', date('d/m/Y')) }}" required>
            </div>

            <div class="col-md-9">
              <label for="description">Descrição</label>
              <textarea rows="1" class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
            </div>

            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary btn-lg mt-5 px-5">Salvar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
