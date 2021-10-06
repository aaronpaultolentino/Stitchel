@extends('layouts.home')

@section('description')
<p class="text-lead text-light">Please sign in below.</p>
@endsection

@section('content')
<div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                    </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">
                    {{ __('Login') }}
                    </button>
                    <button type="submit" class="btn btn-primary my-4">
                    {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <a href="" class="text-light"><small>Forgot password?</small></a>
        </div>
    </div>
</div>
@endsection