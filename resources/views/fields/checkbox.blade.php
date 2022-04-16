<input name="{{ $field->name }}" type="checkbox">
<label>{{ $label }}</label><br />
<pre>
    @php
        print_r($field->attributes)
    @endphp
</pre>
