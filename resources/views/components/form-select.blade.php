@props([
    'name',
    'value' => '',
    'options',
    'default',
    'label' => '',
    'selected' => '',
    'class' => '',
    'required' => false,
    'style' => '',
    'id' => 'xx',
])



<div class="relative">
    <select id="{{ $id }}" class="form-control {{ $class }} @error($name) is-invalid @enderror"
        {{ $attributes }} name='{{ $name }}' style="width: 100%;{{ $style ?? '' }}">
        <option value="">{{ $default }}</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>{{ $text }}</option>
        @endforeach
    </select>
    @if ($label)
        <label for="{{ $id }}" class="form-label">
            {{ $label }} :@if ($required)
                <span class="required">*</span>
            @endif
        </label>
    @endif
    <x-ajaxerror name="{{ $name }}" />
    <x-form-validation :name="$name" />
</div>
