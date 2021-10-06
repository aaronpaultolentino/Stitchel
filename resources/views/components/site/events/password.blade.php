@if($event['require_registration_at'] && !(auth()->guard('accounts')->check()) && !request()->is('admin/clients/*/events/*/registrations*'))
	@if($field->default_field_type == \App\Field::REGISTRATION_EMAIL)
		<div class="form-group row">
		    <label for="exampleFormControlInput1" class="col-sm-4">
		    	Password
		    	<small class="text-danger">*</small>
		    </label>

		    <div class="col-sm-8">
		    	<input type="password" class="form-control" name="customer_password">
			</div>
		</div>

		<div class="form-group row">
		    <label for="exampleFormControlInput1" class="col-sm-4">
		    	Confirm Password
		    	<small class="text-danger">*</small>
		    </label>

		    <div class="col-sm-8">
		    	<input type="password" class="form-control" name="customer_confirm_password">
			</div>
		</div>
		<input type="checkbox" class="object-hidden" name="create-eventleap-account" checked="checked">
	@endif
@endif
