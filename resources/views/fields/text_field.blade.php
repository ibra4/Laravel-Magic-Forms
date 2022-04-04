<div class="form-group">
    <input
        @foreach ($field->attributes as $attr_key => $attr_val) @if (is_bool($attr_val))
            {{ $attr_key }}
        @else
        {{ $attr_key }}="{{ $attr_val }}" 
        @endif @endforeach
        value="{{ $field->value }}">
</div>
@error($field->attributes['name'])
    <small class="text-danger">{{ $message }}</small>
@enderror
<pre>
    @php
        print_r($field->attributes);
    @endphp
</pre>
