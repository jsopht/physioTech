@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col-sm-12 col-md-4 col-lg-2">
          <a href="{{ route('avaliacao.create') }}" class="btn btn-outline-primary py-2 btn-block">Nova avaliação</a>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-10">
      <form >
        <input type="text" class="form-control py-2" id="search" name="q" placeholder="Pesquisa..." value="{{ request()->get('q') }}" autofocus>
      </form>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-sm-12">
      @forelse($evaluations as $evaluation)
        <a href="{{ route('avaliacao.edit', $evaluation->id) }}">
          <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-md-8"><h5>{{ $evaluation->name }}</h5></div>
                  <div class="col-sm-12 col-md-4 text-right">
                      Avaliação: {{ brDate($evaluation->evaluation_date) }}
                      @if(brDate($evaluation->evaluation_date) != brDate($evaluation->updated_at))
                        <span class="text-muted">| Atualizado: {{ brDate($evaluation->updated_at) }}</span>
                      @endif
                  </div>
                </div>
            </div>
          </div>
        </a>
      @empty
        <h3 class="text-muted text-center mt-4"><span> Nenhum dado foi encontrado.</span></h3>
      @endforelse
      <div class="col-12 mt-4">
        {{ $evaluations->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@endsection
