@props([
    // name of the input field for use in passing form submission data
    // this is prefixed with bw- when used as a class name
    'name' => 'bw-filepicker',
    'id' => 'bwww',
    'min_width' => '',
    'min_height' => '',
    'label'=> '',
    // the default text to display in the file picker
    'placeholder' => 'Select a file',
    // by default all file audo, video, image and pdf file types can be selected
    // either restrict or allow more file types by modifying this value
    'accepted_file_types' => 'audio/*,video/*,image/*, .pdf',
    'acceptedFileTypes' => 'audio/*,video/*,image/*, .pdf',
    // should the user be forced to select a file. used in conjunction with validation scripts
    // default is false.
    'required' => false,
    // maximum allowed filezie in MB
    'max_file_size' => 5,
    'maxFileSize' => 5,
    // adds margin after the input box
    'add_clearing' => true,
    'addClearing' => true,
    // display a selected value by default
    'selected_value' => 'jjhjhjh',
    'selectedValue' => '',
    // the css to apply to the selected value
    'selected_value_class' => 'h-52',
    'selectedValueClass' => 'h-52',
    // file to display in edit mode
    'url' => '',
    'sheight'=>'195px'
])
@php
    $id = preg_replace('/[\s-]/', '_', $id);
    $required = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    $add_clearing = filter_var($add_clearing, FILTER_VALIDATE_BOOLEAN);
    $addClearing = filter_var($addClearing, FILTER_VALIDATE_BOOLEAN);
    if (!$addClearing) {
        $add_clearing = $addClearing;
    }
    if ($acceptedFileTypes !== $accepted_file_types) {
        $accepted_file_types = $acceptedFileTypes;
    }
    if ($selectedValue !== $selected_value) {
        $selected_value = $selectedValue;
    }
    if ($selectedValueClass !== $selected_value_class) {
        $selected_value_class = $selectedValueClass;
    }
    if ($maxFileSize !== $max_file_size) {
        $max_file_size = $maxFileSize;
    }
    if (!is_numeric($max_file_size)) {
        $max_file_size = 5;
    }
    $image_file_types = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
@endphp
<div class="border-gray-500"></div>
<div class="relative px-2 py-3 border-2 border-dashed border-gray-300 dark:text-dark-300 dark:border-dark-700
    dark:bg-dark-800 hover:dark:border-dark-600 text-center cursor-pointer rounded-md bw-fp-{{ $id }} @if ($add_clearing) mb-3 @endif"
    style="height: {{$sheight}} !important;">
    <x-bladewind::icon name="document-text" class="h-6 w-6 absolute z-20 left-4 text-gray-300" />
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute z-10 text-gray-300" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
    </svg>
    <x-bladewind::icon name="x-circle"
        class="absolute right-3 h-8 w-8 text-gray-600 hover:text-gray-800 clear cursor-pointer hidden" type="solid" />

    {{-- <button id="resetButton-{{ $id }}" type="button" style="position: absolute;bottom:-30px;right:0px"
        class="absolute  h-8 w-8 text-gray-600 hover:text-gray-800 clear cursor-pointer ">
        Reset
    </button> --}}
    <span class="text-gray-400/80 px-6 pl-10 zoom-out inline-block selection">
        {{ $placeholder }}
        @if ($required)
            <span class="text-red-300">*</span>
        @endif
    </span>
    <div class="w-0 h-0 overflow-hidden">
        <input type="file" name="{{ $name }}" multiple
            class="bw-{{ $id }} @if ($required) required @endif" id="bw_{{ $id }}"
            accept="{{ $accepted_file_types }}" />
        <textarea class="b64-{{ $id }}@if ($required) required @endif"
            name="b64_{{ $name }}"></textarea>
        @if (!empty($selected_value))
            <input type="hidden" class="selected_{{ $id }}" name="selected_{{ $name }}"
                value="{{ $selected_value }}" />
        @endif
        @if($label)
        <label for="bw_{{ $id }}" class="form-label" onclick="dom_el('.{{$name}}').focus()">{!! $label !!} 
            @if($required) <x-bladewind::icon name="star" class="!text-red-400 !w-2 !h-2 mt-[-2px]" type="solid" /> @endif
        </label>
    @endif
    </div>
</div>

@push('spscripts')
    <script>
        // const resetButton = document.getElementById('resetButton-{{ $id }}');
        // resetButton.addEventListener('click', function(e) {
        //     e.preventDefault();
        //     e.stopPropagation();
            
        //     // Reset the file input to clear the selected file
        //     fileInput.value = initialFilePath;
            
        //     // Show the default placeholder text
        //     const selection = document.querySelector('.bw-fp-{{ $id }} .selection');
        //     selection.innerHTML = '{{ $placeholder }}@if ($required) <span class="text-red-300">*</span>@endif';
            
        //     // Hide the "Reset" button
        //     resetButton.classList.add('hidden');
        // });
        dom_el('.bw-fp-{{ $id }}').addEventListener('drop', function(evt) {
            changeCss('.bw-fp-{{ $id }}', 'border-gray-500', 'remove');
            changeCss('.bw-fp-{{ $id }}', 'border-gray-300');
            evt.preventDefault();
            dom_el('.bw-{{ $id }}').click();
        });

        ['dragleave', 'drop', 'mouseout'].forEach(evt =>
            dom_el('.bw-fp-{{ $id }}').addEventListener(evt, () => {
                changeCss('.bw-fp-{{ $id }}', 'border-gray-500', 'remove');
                changeCss('.bw-fp-{{ $id }}', 'border-gray-300');
            }, false)
        );

        ['dragenter', 'dragover', 'mouseover'].forEach(evt =>
            dom_el('.bw-fp-{{ $id }}').addEventListener(evt, () => {
                changeCss('.bw-fp-{{ $id }}', 'border-gray-500');
            }, false)
        );

        dom_el('.bw-fp-{{ $id }}').addEventListener('click', function() {
            dom_el('.bw-{{ $id }}').click();
        });

        dom_el('.bw-{{ $id }}').addEventListener('change', function() {
            let selection = this.value;
            if (selection !== '') {
                const [file] = this.files

                if (file) {
                    if (file.type !== 'image/svg+xml') {
                        // Exclude SVG files from size validation
                        if (allowedFileSize(file.size, {{ $max_file_size }})) {
                           
                            const image = new Image();
                            image.src = URL.createObjectURL(file);

                            image.onload = function() {
                                if (image.width >= {{ $min_width }} && image.height >=
                                    {{ $min_height }}) {
                                    dom_el('.bw-fp-{{ $id }} .selection').innerHTML = '<img src="' +
                                        URL
                                        .createObjectURL(file) +
                                        '" class="rounded-md" style="max-width :100%;max-height: {{$sheight}} !important" />';
                                    convertToBase64(file, '.b64-{{ $id }}');
                                } else {
                                    dom_el('.bw-fp-{{ $id }} .selection').innerHTML =
                                        '<span class="text-red-500">Image dimensions must be {{ $min_width }}x{{ $min_height }} pixels or heigh</span>';
                                    // Clear the input field if the dimensions exceed the limit
                                    dom_el('.bw-{{ $id }}').value = '';
                                }
                            };
                        } else {
                            dom_el('.bw-fp-{{ $id }} .selection').innerHTML =
                                '<span class="text-red-500">File must be {{ $max_file_size }}MB or below</span>';
                            // Clear the input field if the file size exceeds the limit
                            dom_el('.bw-{{ $id }}').value = '';
                        }
                    } else {
                        // Handle SVG files separately (display the selected SVG)
                       
                        const image = new Image();
                        image.src = URL.createObjectURL(file);
                        image.onload = function() {
                            dom_el('.bw-fp-{{ $id }} .selection').innerHTML = '<img src="' +
                                URL
                                .createObjectURL(file) +
                                '" class="rounded-md" style="width :100%;max-height: {{$sheight}} !important" />';
                            convertToBase64(file, '.b64-{{ $id }}');
                        }
                        changeCss('.bw-fp-{{ $id }} .clear', 'hidden', 'remove');
                    }
                }
            }
        });



        convertToBase64 = (file, el) => {
            const reader = new FileReader();
            reader.onloadend = () => {
                const base64String = reader.result; //.replace('data:', '').replace(/^.+,/, ''); 
                dom_el(el).value = base64String;
            };
            reader.readAsDataURL(file);
        }

        allowedFileSize = (file_size, max_size) => {
            return (file_size <= ((max_size) * 1) * 1000000);
        }

        @if (!empty($url))
            @if (in_array(pathinfo($url, PATHINFO_EXTENSION), $image_file_types))
                file =
                    '<img src="{{ $url }}" alt="{{ $url }}" style="width :100%;max-height: {{$sheight}} !important" class="rounded-md {{ $selected_value_class }}" />';
            @else
                file = '{{ $selected_value != '' ? $selected_value : $url }}';
            @endif
            dom_el('.bw-fp-{{ $id }} .selection').innerHTML = file;
            changeCss('.bw-fp-{{ $id }} .clear', 'hidden', 'remove');
        @endif
    </script>
@endpush
