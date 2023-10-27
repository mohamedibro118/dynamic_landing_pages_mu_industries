@props(['type' => 'text', 'class' => 'form-control', 'name', 'value', 'label' => 'xx', 'id' => '', 'required' => false])


@if ($label)
    <label for="{{ $id }}">
        {{ $label }}@if ($required)
            <span class="required">*</span>
        @endif
    </label>
@endif
<textarea type="text" name="{{$name}}" style="height: 150px" class="{{ $class }} @error($name) is-invalid @enderror" id="{{ $id }}">{{ old($name, $value) }}</textarea>
<x-ajaxerror name="{{$name}}" />
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
