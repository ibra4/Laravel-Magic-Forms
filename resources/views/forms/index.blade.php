<form novalidate action="{{ $form->action }}" method="{{ $form->html_method }}"
    @isset($form->classes) class="{{ $form->classes }}" @endisset
    @isset($form->id) id="{{ $form->id }}" @endisset>
    @csrf
    @if ($form->method_field)
        <input type="hidden" name="_method" value="{{ $form->method_field }}">
    @endif
    @foreach ($form->fields as $field)
        @include('magic_form::fields.' . $field->view_name, ['field' => $field])
    @endforeach
    <div class="form-group">
        <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
    </div>
</form>
