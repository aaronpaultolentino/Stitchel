@if(!isset($isTransfer))
	<section id="paymentInformation" class="registerGroup payment-info" style="display: none;">
		<h2>Payment Information</h2>
			<div class="eventProduct">
			<p class="mb-4"><img src="{{ url('assets/icons/accepted-cards.png') }}" id="acceptedCards" alt=""></p>
			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Card Number <small class="text-danger">*</small></label>
			    <div class="col-sm-8" id="cc_number_container">
				    <input type="text" class="form-control cc_information" name="cc_number" placeholder="XXXX XXXX XXXX XXXX">
				</div>
			</div>
			@php
				$months = [
					"January", 
					"February", 
					"March", 
					"April", 
					"May", 
					"June", 
					"July", 
					"August", 
					"September", 
					"October", 
					"November", 
					"December"
				];

				$year = intval(date('Y')) - 1;
		    @endphp
			<div class="form-group row align-items-center" id="cc_exp_container">
			    <label class="col-sm-4">Expiration Date <small class="text-danger">*</small></label>
			    <div class="col-sm-4" id="cc_exp_month_container">
			    	<select class="form-control cc_information"  name="cc_exp_month">
			    		<option value="">Month</option>
			    		@foreach($months as $key => $month)
			    			<option value="{{ str_pad(($key+1), 2, '0', STR_PAD_LEFT) }}">{{ ($key+1).' - '. $month }}</option>
			    		@endforeach
			    	</select>
				</div>
			    <div class="col-sm-4" id="cc_exp_year_container">
			    	<select class="form-control cc_information" name="cc_exp_year">
			    		<option value="">Year</option>
			    		@for($i = 1; $i <= 11; $i++)
			    			<option value="{{ ++$year }}">{{ $year }}</option>
			    		@endfor
			    	</select>
				</div>
			</div>
			<div class="form-group row align-items-center">
			    <label class="col-sm-4">Security Code / CVV <small class="text-danger">*</small></label>
			    <div class="col-sm-8" id="cc_cvv_container">
				    <input type="text" class="form-control cc_information" name="cc_cvv">
				    <img src="{{ url('assets/icons/cc-security-code.png') }}" id="securityCode" alt="" style="right: 25px">
				</div>
			</div>
		</div>
	</section>
@endif