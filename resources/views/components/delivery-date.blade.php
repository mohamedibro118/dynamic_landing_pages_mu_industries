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
    @for ($i = 2023; $i <= 2030; $i++)
        <option value="{{ $i }}" @selected(old($name, $value) == $i)>{{ $i }}
        </option>
    @endfor
</select>
<x-ajaxerror name="{{$name}}" />
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
