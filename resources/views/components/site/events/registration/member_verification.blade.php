@if($event['allow_member_verification_at'] != null)
<h2>
	@if($event['member_verification_label'])
		{{ $event['member_verification_label'] }}
	@else
		Member Verification
	@endif
</h2>
<section id="memberVerification" data-label="{{ $event['ticket_label'] }}">
	<div id='memberIdBox'>
		<div class="form-group row">
		    <div class="col-sm-12">
			    <input type="textbox" class="form-control" id="member_verification_id" name="member_verification_id">
				<small id="verificationStatus"></small>
			</div>
		</div>

		@if($event->tickets->where('allow_member_verification_at', '!=', NULL)->count() > 0)
			<button class="btn btn-warning" id="memberTicketVerification">
	        	Verify to show hidden tickets!
	        </button>
        @endif
        <input type="text" class="hide" id="memberTicketVerificationRoute" value="{{ route('client.event.registration.memberTicketVerification', ['event_slug' => $event->event_slug, 'client_slug' => $event->client->client_slug]) }}">
	</div>
</section>
@endif