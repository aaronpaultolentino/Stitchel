@extends('layouts.home')

@section('description')
<p class="text-lead text-light">Please sign up below.</p>
@endsection

@section('content')
<div class="col-lg-7 col-md-7">
    <div class="card bg-secondary shadow border-0" style="margin-top: -5rem;">
        <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
            </div>
             @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>Success!</strong> You successfully created your account. Please check your email to confirm your account.
                            </div>
                            @endif
                     <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Name">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-paper-plane"></i>
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
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control"
                            name="password" required autocomplete="new-password"
                            placeholder="**********">
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
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="**********">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="{{ route('login') }}" class="text-black text-small">{{ __('Login') }}</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection