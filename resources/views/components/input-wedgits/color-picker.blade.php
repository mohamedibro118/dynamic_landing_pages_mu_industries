@props(['name', 'style' => '', 'caller' => 'xxx', 'value', 'label' => ''])
<div class="relative">
    <input type="text" id="flatClearable_{{ $caller }}" name="{{ $name }}" {{ $attributes }}
        value="{{ $value }}">
    @if (!empty($label))
        <label for="flatClearable_{{ $caller }}" class="form-label"
            onclick="dom_el('.{{ $name }}').focus()">{!! $label !!}
        </label>
    @endif
</div>



@push('spscripts')
    <script>
        $(document).ready(function() {
            const colorInput = $("#flatClearable_{{ $caller }}");
            // Initialize the Spectrum color picker
            colorInput.spectrum({
                color: "{{ $value ?? '#f00' }}", // Set the initial color here
                preferredFormat: "hex",
                showInput: true,
                palette: [
                    ["red", "rgba(0, 255, 0, .5)", "rgb(0, 0, 255)"]
                ]
            });


        });
    </script>
@endpush
