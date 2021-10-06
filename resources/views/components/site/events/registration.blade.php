@if(\Carbon\Carbon::parse($event->registration_end_at)->isPast())
	{!! $event['registration_closed_message'] !!}
@elseif(\Carbon\Carbon::parse($event->registration_start_at)->isFuture())
	{!! $event['registration_pending_message'] !!}
@else
	<div id="event-info" data-id="{{ $event->id }}" data-name="{{ $event->event_name }}" data-slug="{{ $event->event_slug }}"></div>
	@if(!isset($isTransfer))
		
		@include('components.site.events.registration.member_verification')
		@include('components.site.events.registration.tickets')
		<hr />

		<!-- END Tickets -->

		<!-- Products -->
		@include('components.site.events.registration.products')
		
		<!-- End Products -->
	@else
		@yield('ticket_transfer')
	@endif
	<!-- Registration Fields -->
	@include('components.site.events.registration.fields')

	<section >
	<!-- End Registration Fields -->

	<!-- Billing or Customer Information -->
	@include('components.site.events.registration.info')
	
	<!-- Endf Billing or Customer Information -->
	
	<!-- Shipping -->
	@include('components.site.events.registration.shipping')
	
	<!-- End Shipping -->

	<!-- Payment Information -->
	@include('components.site.events.registration.payment')

	<!-- End Payment Information -->

	<!-- Require Registration -->
	@include('components.site.events.registration.create-account')
	
	<!-- End Require Registration -->

	

	@include('components.site.events.registration.terms')
	


	<div class="registrationSubmit">
	<button id="checkoutButton" class="buttonLarge">
		<span id="checkoutButtonLabel">Complete Registration</span>
		<small id="checkoutCharge"></small>
	</button>
	</div>

	</section>
	
	@if(auth()->guard('accounts')->check())
		<div id="user-info" data="{{ auth()->guard('accounts')->user() }}"  style="display: none;"></div>
	@endif
	<!-- End Registration Fields -->

	<input type="text" id="computeRoute" style="display: none;" value="{{ route('client.event.registration.compute', ['event_slug' => $event->event_slug, 'client_slug' => $event->client->client_slug]) }}">
	<input type="text" id="couponRoute" style="display: none;" value="{{ route('client.event.registration.validateCoupon', ['event_slug' => $event->event_slug, 'client_slug' => $event->client->client_slug]) }}">
	<input type="text" id="registerRoute" style="display: none;" value="{{ route('client.event.registration.register', ['event_slug' => $event->event_slug, 'client_slug' => $event->client->client_slug]) }}">
@endif
@include('components.image-modal')
  
@if($event->merchant == \Eventleap\Services\Merchant\MerchantFactory::BRAINTREE)
	@include('components.site.events.merchants.braintree.index')
@endif

@push('scripts')
<script type="text/javascript" src="{{ url('Foundation/ShowImage/ShowImage.js?v='.config('eventleap.asset_version')) }}"></script>
<script type="text/javascript" src="{{ url('js/site/events/registration.js?v='.config('eventleap.asset_version')) }}"></script>

@endpush