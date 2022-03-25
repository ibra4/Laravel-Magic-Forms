<div class="form-group">
    <input @foreach ($field->attributes as $attr_key => $attr_val) {{ $attr_key }}="{{ $attr_val }}" @endforeach
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
