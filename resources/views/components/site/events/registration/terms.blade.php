<section>
		<h2 class="mb-4">Terms &amp; Conditions</h2>
		<div class="eventProduct" id="eventTerms">
			<div class="input">
				<div class="custom-control custom-checkbox mb-3">
			      <input type="checkbox" id="terms-and-condition" name="terms-and-condition" class="custom-control-input" >
			      <label class="custom-control-label eventleap-field-checkbox-label" for="terms-and-condition" style="font-size: 1rem;">I agree to the event terms and conditions below as well as the <a href="http://www.eventleap.com/terms.php" target="_blank">EventLeap Terms of Service</a>.</label>
			    </div>
			</div>

			<div id="checkoutDisclaimer">
				{!! $event['terms_and_conditions'] !!}
			</div>
		</div>
	</section>