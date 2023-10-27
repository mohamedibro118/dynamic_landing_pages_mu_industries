@props([
    'label' => '',
    'props' => null,
    'value' => null,
    'name' => 'description',
    'id' => 'description',
    'sheight' => '200',
    'required' => false,
])

<div class="relative">
    <textarea name='{{ $name }}' {{ $props }} class="form-control" id="{{ $id }}">{{ old($name, $value) }}</textarea>
    @if (!empty($label))
        <label for="{{ $id }}" class="form-label"
            onclick="dom_el('.{{ $name }}').focus()">{!! $label !!}
            @if ($required)
                <x-bladewind::icon name="star" class="!text-red-400 !w-2 !h-2 mt-[-2px]" type="solid" />
            @endif
        </label>
    @endif
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


@push('spscripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: "#{{ $id }}",
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | link | numlist bullist | forecolor backcolor | fontsize | formatselect | h1 h2 h3 ',
                menubar: false,
                branding: false,
                height: "{{ $sheight }}",
                forced_root_block: false,
                setup: function(editor) {
                    editor.on('change', function() {
                        var content = editor.getContent();
                        document.getElementById('{{ $id }}').value = content;
                    });
                },
            });

        });
    </script>
@endpush
