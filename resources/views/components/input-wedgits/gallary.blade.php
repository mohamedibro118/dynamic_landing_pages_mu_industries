@props(['label' => '', 'name' => 'gallary[]', 'path' => null, 'id' => 'logo', 'required' => true, 'nameferror' => 'gallary'])
<div class="col-md-12 mt-2 ">
    <label for="{{ $id }}" class="form-label">{{ $label }}@if ($required)
            <span class="required">*</span>
        @endif
    </label>
    <input type="file" class="form-control @error('name_ar') is-invalid @enderror" id="{{ $id }}" multiple
        name="{{ $name }}" placeholder="{{ __('choose your photos') }}">
    <div id="imagePreviewContainer_{{ $id }}"></div>
    <div class="Gallary-preview my-3 {{ $id }}" id="Gallarypreview_{{ $id }}">

        @if ($path)
            @foreach (json_decode($path) as $item)
                <div class="Gallary-preview__colom">
                    <img class="Gallary-preview__Gallary" alt="Gallary-preview" src="{{ asset($item) }}">
                </div>
            @endforeach
        @endif

        <span class="Gallary-preview__text-default"
            @if ($path) style="display:none" @endif>Gallary preview</span>
    </div>

    <small id="{{ $nameferror }}_error"></small>
    <small id="{{ $nameferror }}.*_error"></small>
    @error('{{ $nameferror }}.*')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    @error('{{ $nameferror }}')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="row" id="img_list">

</div>
@push('spscripts')
    <script>
        $(document).ready(function() {
            var container = $('#{{ $id }}');
            container.on('change', function() {

                const selectedFiles = this.files;
                const validFiles = [];
                const allowedTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/webp', 'image/jpg'];
                $('.{{ $id }} .Gallary-preview__colom').remove();
                let countselectedFiles = selectedFiles.length;

                new Promise((resolve, reject) => {
                    for (let i = 0; i < selectedFiles.length; i++) {
                        const selectedFile = selectedFiles[i];
                        const reader = new FileReader();

                        reader.onload = function(event) {
                            const img = new Image();

                            img.onload = function() {
                                const width = this.width;
                                const height = this.height;
                                const minWidth = 1000;
                                const minHeight = 750;

                                if (width < minWidth || height < minHeight || !allowedTypes
                                    .includes(selectedFile.type)) {
                                    alert(
                                        'The Galleries Images Must Be Greater Than 1000x750.and Only JPEG, GIF, PNG,JPG and WebP files are allowed.'
                                        );
                                    removefromfilelistgallary(selectedFile)
                                    countselectedFiles = countselectedFiles - 1
                                    // reject('Invalid files found');
                                } else {
                                    validFiles.push(selectedFile); // add file to validFiles
                                }
                            };

                            img.src = event.target.result;
                        };

                        reader.readAsDataURL(selectedFile);
                    }
                    resolve(validFiles);
                }).then((validFiles) => {
                    setTimeout(() => {
                        console.log("Number of valid images: " + validFiles.length);
                        $('.{{ $id }} .Gallary-preview__text-default').css({
                            'display': 'none',
                        });
                        for (let j = 0; j < validFiles.length; j++) {
                            const img = $('<div class="Gallary-preview__colom"> </div>')
                                .append($(
                                    '<img class="Gallary-preview__Gallary" alt="Gallary-preview">'
                                ).attr('src', URL.createObjectURL(validFiles[j])))
                                .append($('<span class="xdelete">x</span>').on('click',
                                    function() {
                                        removefromfilelistgallary(validFiles[j]);
                                        $(this).parent().remove();
                                    }));
                            // img.draggable();
                            $('.Gallary-preview.{{ $id }}').append(img)
                            // update input files with validFiles
                            const dt = new DataTransfer();
                            for (let j = 0; j < validFiles.length; j++) {
                                dt.items.add(validFiles[j]);
                            }
                            const input = document.getElementById('{{ $id }}')
                            input.files = dt.files;

                        }
                    }, 1000);
                });

            });



            function removefromfilelistgallary(x) {
                const dt = new DataTransfer();
                const input = document.getElementById('{{ $id }}')
                const {
                    files
                } = input;
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file !== x) {
                            dt.items.add(file);
                        }
                    }
                    input.files = dt.files;
                }
            }

        });
    </script>
@endpush
