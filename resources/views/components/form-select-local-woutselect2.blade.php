@props(['name', 'selected' => '', 'options' => [], 'default', 'label' => '', 'required' => false,'style'=>''])


@if ($label)
    <label for="gnselect" class="form-label">
        {{ $label }} :@if ($required)
            <span class="required">*</span>
        @endif
    </label>
@endif

<select class="form-control @error($name) is-invalid @enderror" name='{{ $name }}' {{ $attributes }} style="width: 100%;{{$style ??''}}">
    <option value="">{{ $default }}</option>
    @foreach ($options as $item)
        <option value="{{ $item->id }}" @selected(old($name, $selected) == $item->id)>{{ $item->name }}</option>
    @endforeach
</select>
<x-ajaxerror name="{{$name}}" />
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
