@extends('layouts.home')

@section('content')
<div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
                <small>Reset Password</small>
            </div>
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">
                    {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
