<div class="form-group row custom-fields-container align-items-center">
    <label for="exampleFormControlInput1" class="col-sm-4">
    	{{ $field->field_name }}
    	@if($field->field_validation == \App\Field::VALIDATION_REQUIRED)
	    <small class="text-danger">*</small>
	    @else
	    	@if(!is_null($event['require_registration_at']) && $field->entity_type == \App\Field::FIELD_TYPE_EVENT && ($field->default_field_type == \App\Field::REGISTRATION_EMAIL || $field->default_field_type == \App\Field::REGISTRATION_FIRST_NAME || $field->default_field_type == \App\Field::REGISTRATION_LAST_NAME))
	    		<small class="text-danger">*</small>
	    	@endif
	    @endif
    </label>

    <div class="col-sm-8">
    	@include('components.site.events.fields.type.'.$field->field_type, [
									        'field' => $field,
									        'type' => $type,
									        'value' => $value ?? '',
									    ])
	    <small class="text-muted">{{ $field->field_notes }}</small>
	</div>
</div>
