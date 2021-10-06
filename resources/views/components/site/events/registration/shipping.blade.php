<!-- <section>
	<div id="shippingBox" class="eventProduct">
		<h2>Shipping Address</h2>

		<div class="form-group">
			<div class="custom-control custom-checkbox mb-3">
		      <input type="checkbox" id="same-as-billing" name="same-as-billing" class="custom-control-input" >
		      <label class="custom-control-label eventleap-field-checkbox-label" for="same-as-billing" style="font-size: 1rem;"> Same as Billing Address?</label>
		    </div>
		</div>
		<div id="shippingFields">
			<div class="form-group row">
			    <label class="col-sm-4">First Name</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_first_name">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">Last Name</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_last_name">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">Address 1</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_address_1">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">Address 2</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_address_2">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">City</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_city">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">State</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_state">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">Zip</label>
			    <div class="col-sm-8">
				    <input type="textbox" class="form-control shipping-info-fields" name="shipping_zip">
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-4">Country</label>
			    <div class="col-sm-8">
				    <select name="shipping_country" class="form-control shipping-info-fields">
					    @foreach($countries as $country)
					        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
					    @endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
</section> -->