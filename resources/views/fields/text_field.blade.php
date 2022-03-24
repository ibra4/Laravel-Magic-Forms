{{-- <div @isset($field->id) id="field_{{ $field->id }}_wrapper" @endisset
    class="form-group{{ !empty($field->wrapper_classes) ? ' ' . $field->wrapper_classes : '' }}">
    <label for="{{ $field->id }}">{{ $field->label }}</label>
    <input type="{{ $field->type }}" name="{{ $field->name }}" id="{{ $field->id }}"
        class="form-control{{ !empty($field->classes) ? ' ' . $field->classes : '' }}"
        @isset($field->placeholder) placeholder="{{ $field->placeholder }}" @endisset
        {{ $field->required ? 'required' : '' }} {{ $field->disabled ? 'disabled' : '' }}
        @isset($field->pattern) pattern="{{ $field->pattern }}" @endisset value="{{ $field->value }}">
    @isset($field->description)
        <small class="d-block text-secondary">
            {{ $field->description }}
        </small>
    @endisset
    @error($field->name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<pre>
    @php
        print_r($field->attributes);
    @endphp
</pre> --}}
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
