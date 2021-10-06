<!-- Login Modal -->
<div class="modal fade" id="loginModalForm" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="loginModalTitle">Login</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="{{ route('client.event.accounts.login.attempt', [
                    'client_slug' => request()->route('client_slug'),
                    'event_slug' => request()->route('event_slug'),
                ]) }}" id="loginForm">
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
	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="confirm-login">Login</button>
      </div>
    </div>
  </div>
</div>