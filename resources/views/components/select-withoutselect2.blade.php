@props(['name', 'value' => '', 'options', 'default', 'label' => '', 'required' => false,'style'])


@if ($label)
    <label for="gnselect" class="form-label">
        {{ $label }} :@if ($required)
            <span class="required">*</span>
        @endif
    </label>
@endif

<select class="form-control @error($name) is-invalid @enderror" id="gnselect" name='{{ $name }}' style="width: 100%;{{$style ??''}}">
    <option value="">{{ $default }}</option>
    @foreach ($options as $item)
        <option value="{{ $item->id }}" @selected(old($name, $value) == $item->id)>
            {{ 'en' == App::getLocale() ? $item->name_en : $item->name_ar }}</option>
    @endforeach
</select>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
