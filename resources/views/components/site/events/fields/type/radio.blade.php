
@php
    $options = json_decode($field->options) ?? [];
@endphp

@foreach($options as $key => $option)
    <div class="custom-control custom-radio mb-3">
      <input type="radio" id="field-{{ $type }}-{{ $field->id }}-{{ $key }}" name="field-{{ $type }}-{{ $field->id }}[]" class="custom-control-input custom-fields" value="{{ $option->value }}" field-id="{{ $field->id }}" @if(!empty($value))@if($value == $option->value) checked="checked" @endif @endif>
      <label class="custom-control-label eventleap-field-radio-label" for="field-{{ $type }}-{{ $field->id }}-{{ $key }}">{{ $option->value }}</label>
    </div>
@endforeach