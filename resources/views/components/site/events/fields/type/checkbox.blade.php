
@php
    $options = json_decode($field->options) ?? [];
    $value = json_decode($value, true);
    $value = is_null($value) ? [] : $value;
@endphp

@foreach($options as $key => $option)
    <div class="custom-control custom-checkbox mb-3">

      <input type="checkbox" id="field-{{ $type }}-{{ $field->id }}-{{ $key }}" name="field-{{ $type }}-{{ $field->id }}[]" class="custom-control-input custom-fields" value="{{ $option->value }}" field-id="{{ $field->id }}" @if(count($value) > 0)@if(in_array($option->value, $value)) checked="checked" @endif @endif>
      <label class="custom-control-label eventleap-field-checkbox-label" for="field-{{ $type }}-{{ $field->id }}-{{ $key }}">{{ $option->value }}</label>
    </div>
@endforeach