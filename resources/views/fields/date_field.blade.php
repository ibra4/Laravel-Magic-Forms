<input type="date"
    @foreach ($field->attributes as $attr_key => $attr_val) @if (is_bool($attr_val))
{{ $attr_key }}
@else
{{ $attr_key }}="{{ $attr_val }}" 
@endif @endforeach
    value="{{ old($field->name, $field->value) }}">
<pre>
    @php
        print_r($field->attributes)
    @endphp
</pre>
