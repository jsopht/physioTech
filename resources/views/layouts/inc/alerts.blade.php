@if (count($errors))
  <div class="alert alert-danger" role="alert">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endif

@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
  </div>
@endif

@if (Session::has('info'))
  <div class="alert alert-info" role="alert">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          {{ Session::get('info') }}
        </div>
      </div>
    </div>
  </div>
@endif
