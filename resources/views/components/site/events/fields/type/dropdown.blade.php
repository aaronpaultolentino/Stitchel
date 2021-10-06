<select name="field-{{ $type }}-{{ $field->id }}" class="form-control custom-fields" field-id="{{ $field->id }}">
    @php
        $options = json_decode($field->options) ?? [];
    @endphp
    @foreach($options as $option)
        <option @if(!empty($value))@if($value == $option->value) selected="selected" @endif @endif>{{ $option->value }}</option>
    @endforeach
</select>