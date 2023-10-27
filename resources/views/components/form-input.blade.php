@props(['type' => 'text', 'class' => 'form-control', 'name', 'value', 'label' => '', 'required' => false])


@if ($label)
    <label for="name">
        {{ $label }}@if ($required)
            <span class="required">*</span>
        @endif
    </label>
@endif

<input type="{{ $type ?? 'text' }}" class="{{ $class }} @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name, $value) }}"
    {{ $attributes }} autocomplete="off">
<x-ajaxerror name="{{$name}}" />
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
