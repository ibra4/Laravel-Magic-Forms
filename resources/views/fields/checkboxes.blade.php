@php
$values = old($field->name, $field->value);
$values = is_array($values) ? $values : [];
@endphp
@foreach ($field->parameters['options'] as $value => $label)
    <input name="{{ $field->name }}[]" type="checkbox" value="{{ $value }}"
        {{ in_array($value, $values) ? 'checked' : '' }}>
    <label>{{ $label }}</label><br />
@endforeach
<pre>
    @php
        print_r($field->attributes)
    @endphp
</pre>
