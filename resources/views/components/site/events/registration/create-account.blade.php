@if(!$event['require_registration_at'])
		@if(!auth()->guard('accounts')->check())
	
			<section id='registrationUserAccount' class='registerGroup'>
				<h2>Create an Account</h2>
				
				<!--? if ($customer) : ?-->
					<!--div>You are currently logged in as <--?= $customer['Customer']['username'] ?>.</div-->
				<!--? else : ?-->
				<!--<p>Creating an optional EventLeap account allows you to login and manage events you have signed up for.  You can also add tickets and make other changes to your registration.</p>-->
				<div class="eventProduct">
					<div class="form-group">
						<div class="custom-control custom-checkbox mb-3">
					      <input type="checkbox" id="create-eventleap-account" name="create-eventleap-account" class="custom-control-input" >
					      <label class="custom-control-label eventleap-field-checkbox-label" for="create-eventleap-account" style="font-size: 1rem;"> Create an Account?</label>
					      <div><small class="text-muted">This allows you to return to the site, view and make changes to your {{ strtolower($event['ticket_label']) }}s.</small></div>
					    </div>
					</div>
					<div id='registrationUserAccountFields' class='hide'>
						<p>Your login will be the email address you provided above as well as the following password:</p>
						<div class="form-group row">
						    <label class="col-sm-4">Password <small class="text-danger">*</small></label>
						    <div class="col-sm-8">
							    <input type="password" class="form-control" name="customer_password">
							</div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-4">Confirm Password <small class="text-danger">*</small></label>
						    <div class="col-sm-8">
							    <input type="password" class="form-control" name="customer_confirm_password">
							</div>
						</div>
					</div>
				</div>
				<!--? endif ?-->
				
			</section>
		@endif
	@endif