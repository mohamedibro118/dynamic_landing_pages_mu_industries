<div class="form-group">
    @if ($label)
        <label class="form-label ">{{ $label }} :
            @if ($required ?? false)
                <span class="required">*</span>
            @endif
        </label>
    @endif
    @foreach ($options as $value => $text)
        <div class="form-check">
            <input class="form-check-input @error($name) is-invalid @enderror" type="radio" name="{{ $name }}" value="{{ $value }}"
                @checked(old($name, $selected) == $value)>
            <label class="form-check-label">{{ $text }}</label>
        </div>
    @endforeach
    <x-ajaxerror name="{{$name}}" />
</div>
<x-form-validation name={{ $name }} />
