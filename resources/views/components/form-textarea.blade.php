    @if ($label)
        <label for="descriptionnn" class="form-label">
            {{ $label }} :
            @if ($required)
                <span class="required">*</span>
            @endif
        </label>
    @endif

    <textarea name="{{ $name }}"  class="form-control @error($name) is-invalid @enderror" rows="3">{{ old($name, $value) }}</textarea>
    <x-ajaxerror name="{{$name}}" />
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
