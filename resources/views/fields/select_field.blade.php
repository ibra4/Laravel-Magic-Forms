<div class="form-group">
    <select
        @foreach ($field->attributes as $attr_key => $attr_val) @if (is_bool($attr_val))
            {{ $attr_key }}
        @else
        {{ $attr_key }}="{{ $attr_val }}" 
        @endif @endforeach>
        @foreach ($field->parameters['options'] as $value => $label)
            <option value="{{ $value }}" @if (isset($field->value) && $field->value != '' && $field->value == $value) selected @endif>{{ $label }}
            </option>
        @endforeach
    </select>
</div>
@error($field->attributes['name'])
    <small class="text-danger">{{ $message }}</small>
@enderror
<pre>
    @php
        print_r($field->attributes);
    @endphp
</pre>
