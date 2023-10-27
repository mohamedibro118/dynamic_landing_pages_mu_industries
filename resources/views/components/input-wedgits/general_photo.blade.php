@props([
    'label' => '',
    'name' => 'photo',
    'path' => null,
    'id' => 'photo',
    'required' => true,
    'width' => 520,
    'height' => 400,
])

<div class="relative">
    <input type="file" class="file-logo__roi form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" placeholder="{{ __('choose your Logo') }}">
    <label for="{{ $id }}" class="form-label">
        {{ $label }} :(D:Min {{ $width . ' * ' . $height }}): @if ($required)
            <span class="required">*</span>
        @endif
    </label>
    <div class="image-preview my-2 {{ $id }}" id="imagepreview" style="height: 150px">
        <img class="image-preview__image" style="height: 150px;{{ $path ? 'display: block' : '' }}"
            @if ($path) src="{{ asset($path) }}" @endif alt="image-preview">
        <span class="image-preview__text-default" style="{{ $path ? 'display:none' : '' }}">image
            preview</span>
    </div>
    {{-- error from  ajax --}}
    <x-ajaxerror name="{{ $name }}" />
    {{-- error fromvalidation  --}}
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



{{-- script to diplay image in div when chosen  --}}
@push('spscripts')
    <script>
        $(document).ready(function() {
            var container = $('#{{ $id }}');

            container.on('change', function() {
                let selectedFile = this.files[0];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = new Image();
                    img.onload = function() {
                        const width = this.width;
                        const height = this.height;
                        const minWidth = {{ $width }};
                        const minHeight = {{ $height }};

                        // Check if the selected file is an SVG
                        const isSVG = selectedFile.type === 'image/svg+xml';

                        if (!isSVG && (width < minWidth || height < minHeight)) {
                            container.val('');
                            alert(
                                'The Logo Image Must Be Greater Than {{ $width }} * {{ $height }}');
                            $('.{{ $id }} .image-preview__text-default').css({
                                'display': 'block',
                            });
                            $('.{{ $id }} .image-preview__image').css({
                                'display': 'none',
                            });
                        } else {
                            $('.{{ $id }} .image-preview__text-default').css({
                                'display': 'none',
                            });
                            $('.{{ $id }} .image-preview__image').css({
                                'display': 'block',
                            });
                            $('.{{ $id }} .image-preview__image').attr('src', reader
                                .result);
                        }
                    };

                    img.src = event.target.result;
                };

                reader.readAsDataURL(selectedFile);
            });

        });
    </script>
@endpush
