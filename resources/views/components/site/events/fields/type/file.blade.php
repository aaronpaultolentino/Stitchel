<input type="file" class="form-control custom-fields" name="field-{{ $type }}-{{ $field->id }}" field-id="{{ $field->id }}">
<input type="text" class="object-hidden form-control temp-filename" name="temp-filename-{{ $type }}-{{ $field->id }}">

@if($value)
 @if(Storage::exists('public/registration/' . $registration->id .'/'. $value))
 <div>
 <a href="{{ 
                                                Storage::url('public/registration/' . $registration->id .'/'. $value) }}" download="">(Download)</a></div>
 @endif
@endif