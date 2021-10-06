@if(!isset($isTransfer))
	<section style="display: none;" class="payment-info">
		<h2 id='billingTitle'>
			<span class='billingTitle billingTitleShowCard'>Billing Information</span>
			<span class='billingTitle billingTitleHideCard hide'>Customer Information</span>
			<span class='billingTitle billingTitleLoading hide'>Please Wait...</span>
		</h2>
		<div id="billingBox" class="eventProduct <?=$event['Event']['free_event'] && $event['Event']['hide_customer_info'] ? 'hide' : ''?>">

			

			<div class="form-group row align-items-center" >
			    <label class="col-sm-4">First Name <small class="text-danger">*</small></label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="cc_first_name">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Last Name <small class="text-danger">*</small></label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="cc_last_name">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Address</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="registrant_address_1">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Apt, suite, etc (optional)</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="registrant_address_2">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">City</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="registrant_city">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">State</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="registrant_state">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Zip</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control customer-info-fields" name="registrant_zip">
				</div>
			</div>

			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Country</label>
			    <div class="col-sm-8">
				    <select name="registrant_country" class="form-control customer-info-fields">
					    @foreach($countries as $country)
					        <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
					    @endforeach
					</select>
				</div>
			</div>
		</div>
	</section>
@endif