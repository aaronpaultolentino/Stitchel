<!-- Tickets -->
<section id="registrationTickets" data-label="{{ $event['ticket_label'] }}">
	<h2>Choose Your {{ $event['ticket_label'] }}</h2>
	<p style="line-height:17px"><small>{{ $event['ticket_note'] }}</small></p>
	<!-- To Do! -->
	<div id='verifyMemberIdBox' class='hide'>
		@if ($event['Event']['verify_member_id_message'])
			<== $event['Event']['verify_member_id_message'] ?>
		@else
			There are more <== $ticketNameLower; ?>s available for this event. Please verify your Member ID to see what other <== $ticketNameLower; ?>s are available.
		@endif
		<div id='memberIdBox'>
			<span class='input text'>
			<== $form->input('Extra.verify_member_id', array('div' => false, 'label' => false)); ?>
			</span>
			<input id='verifyMemberIdButton' type='button' value='Verify' />
			<span id='verifyMemberIdStatus' class='hide'></span>
		</div>
	</div>
	<div id="chooseTicket">
		@foreach($event->tickets as $k=> $ticket)

		<div
			class='ticketBox  {{ ($ticket->allow_member_verification_at != null && $event->allow_member_verification_at != null) ? "hide verifyTickets" : "" }}'
			data-id="{{ $ticket->id }}"
			data="{{ $ticket }}"
			>
			<div class="singleTicket">

				<button class="btn btn-success addTicketLink"><i class="fas fa-plus"></i> Add</button>

				<h3>{{ $ticket['ticket_name'] }}</h3>

				<p class="ticketPricing">
					@if(isset($ticket['special_price']['is_default']))
						<span class="defaultPrice">${{ number_format($ticket['default_price']['price'], 2) }}</span>
						<span class="specialPrice">
							${{ number_format($ticket['special_price']['price'], 2) }}
							<span class="priceName">
								{{ $ticket['special_price']['ticket_price_name'] }}
							</span>
							<span class="priceDate">
								{{ date('M j, Y', strtotime($ticket['special_price']['start_at'])) }} - {{ date('M j, Y', strtotime($ticket['special_price']['end_at'])) }}
							</span>
						</span>
					@else
						<span class="specialPrice">${{ number_format($ticket['default_price']['price'], 2) }}</span>
					@endif
				</p>

					<!-- To do! -->
					<!-- recurring -->

				@if($ticket['ticket_description'])
					<p class='ticketDescription'>{{ substr($ticket['ticket_description'], 0, 500) }}</p>
				@endif

				<span style="display: none;">
					<!-- To do! is_dependent-->
				
				</span>
				<!-- Ticket Pass Code Hide Temporarily -->
				{{-- @if ($ticket['ticket_pass_code'] != '')
					<div class="form-group row">
					    <label class="col-sm-4">Enter {{ strtolower($event['ticket_label']) }} code</label>
					    <input type="textbox" class="form-control col-sm-8" name="ticket_pass_code">
					</div>
				@endif --}}

				<div id="ticketsContainer">
					<div class="ticketNames">
						<div class="ticketNameBox templateFields">
							<div class="ticketNameBox2">
								<div class="row mb-3">
									<div class="col-lg-6">
										<h4>{{ $ticket['ticket_name'] }} #<span class="registration-ticket-index">1</span></h4>
									</div>

									<div class="col-lg-6 text-right">
										<a class="btn text-white btn-sm btn-danger deleteTicket"><i class="fas fa-trash"></i> Delete</a>
									</div>
								</div>
								@if($ticket->require_name)
								<div class="form-group row align-items-center">
								    <label class="col-sm-4">Name <small class="text-danger">*</small></label>
								    <div class="col-sm-8">
									    <input type="textbox" class="form-control registration-ticket-name">
									</div>
								</div>
								@endif
								@if($ticket->require_email)
								<div class="form-group row align-items-center">
								    <label class="col-sm-4">Email <small class="text-danger">*</small></label>
								    <div class="col-sm-8">
									    <input type="textbox" class="form-control registration-ticket-email">
									</div>
								</div>
								@endif
							</div>
							<div class="ticketNameFields">
								@php
									$ticketFields = is_null($ticket['parent_field_ticket_id']) ? $ticket['fields'] : $ticket['related_field'];
								@endphp
								@foreach($ticketFields as $field)
									@include('components.site.events.fields.index', [
								        'field' => $field,
								        'type' => 'ticket'
								    ])
								@endforeach
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach
	</div>
</section>