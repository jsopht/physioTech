@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6 offset-md-3 mt-5 pt-5">
      <div class="card card-shadow p-4">
        <div class="card-body">
          <div class="mb-3 text-center">
            <figure><img src="{{ url('img/abraao.jpg') }}" class="img-fluid login-img"></figure>
            <h5>Dr. Abraão Pontes</h6>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
              @if ($errors->has('email'))
                <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password">Senha</label>
              <input type="password" name="password" class="form-control" id="password">
              @if ($errors->has('password'))
                <small id="passwordHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
              @endif
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Entrar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>



{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div> --}}
@endsection
