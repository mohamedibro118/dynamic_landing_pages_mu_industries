@if ($label)
    <label for="gnselect" class="form-label">
        {{ $label }} :
        @if ($required ?? false)
            <span class="required">*</span>
        @endif
    </label>
@endif

<select class="form-control @error($name) is-invalid @enderror" id="gnselect" name='{{ $name }}' style="width: 100%;{{$style ??''}}">
    <option value="">{{ $default }}</option>
    @for ($i = 1; $i <= 25; $i++)
        <option value="{{ $i }}" @selected(old($name, $value) == $i)>{{ $i }} {{ __('messages.years') }}
        </option>
    @endfor
</select>
<x-ajaxerror name="{{$name}}" />
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
