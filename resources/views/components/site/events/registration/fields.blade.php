<section>
<h2 class="mb-4">Registration Information</h2>
<div id="registrationFields" class="eventProduct">
	@foreach($fields as $field)
		@include('components.site.events.fields.index', [
	        'field' => $field,
	        'type' => 'event'
	    ])

	    @include('components.site.events.password', ['field' => $field])
	@endforeach
</div>
</section>