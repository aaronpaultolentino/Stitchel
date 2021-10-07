@extends('layouts.home')

@section('description')
<p class="text-lead text-light">Please sign in below.</p>
@endsection

@section('content')
<div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0" style="margin-top: -6rem;">
        <div class="card-body px-lg-5 py-lg-5">
             <form method="POST" action="{{ route('login') }}">
                @csrf 
                <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">
                        <div class="input-group-append">
                            <span class="input-group-text">
                               <i class="fas fa-key"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block">
                        {{ __('Login') }}
                    </button>

                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}> Remember me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-small forgot-password text-black"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="" class="text-black text-small">Create new account</a>
                </div>
            </form>
            <div class="text-center social-btn">
                <h3 class="title">Or</h3>
                    <p class="text">Sign In with social media</p>
            <a href="#" class="btn btn-primary rounded-circle"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-info rounded-circle"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-danger rounded-circle"><i class="fa fa-google"></i></a>
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <a href="{{ route('login') }}" class="text-light"><small>Forgot password?</small></a>
        </div>
    </div>
</div>
@endsection