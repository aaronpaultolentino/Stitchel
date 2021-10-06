@extends('layouts.app')

@section('content')

@include('components.datatable')

<div class="row mt--7">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                            
                        <h2 class="mb-0">Update Profile</h2>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> Profile has been saved!
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Please correct fields below!
                </div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">Profile information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" name="email" id="input-email" class="form-control " placeholder="Email" value="{{ old('email') ? old('email') : $user->email ?? '' }}">
                                    @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">First Name</label>
                                    <input type="text" name="first_name" id="input-first-name" class="form-control " placeholder="First name" value="{{ old('first_name') ? old('first_name') : $user->first_name ?? '' }}">
                                    @error('first_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-middle-name">Middle Name</label>
                                    <input type="text" name="middle_name" id="input-middle-name" class="form-control " placeholder="Middle name" value="{{ old('middle_name') ? old('middle_name') : $user->middle_name ?? '' }}">
                                    @error('middle_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Last Name</label>
                                    <input type="text" name="last_name" id="input-last-name" class="form-control " placeholder="Last name" value="{{ old('last_name') ? old('last_name') : $user->last_name ?? '' }}">
                                    @error('last_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Password Details</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-usernamepassword">Password</label>
                                    <input type="password" id="input-password" class="form-control " placeholder="New Password"  name="password"  autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-confirm-password">Confirm Password</label>
                                    <input type="password" id="input-confirm-password" class="form-control " placeholder="Confirm Password"  name="confirm_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <a class="btn btn-secondary" href="{{ url('admin/home') }}"><i class="fas fa-undo"></i> Cancel</a>
                        <button type="submit" class="btn btn-primary text-left" name="Submit"><i class="fas fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    
@endpush