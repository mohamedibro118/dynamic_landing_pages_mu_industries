@props(['id', 'name' => 'locationval', 'value', 'placeholder', 'style'=>'',
'searchName' => 'searchinputbox', 'searchPlaceholder' => 'Type Here ..',
 'searchUrl', 'noResultMessage' => 'there is no result for your serch try with another location'])

<div class="containercontainerselectbox" id="{{ $id }}" style="{{$style}}">
    <div class="select-box">
        <div class="options-container">
            {{-- here are the options as labels --}}
        </div>
        <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value ?? '') }}">
        <input type="hidden" name="colomname" id="colomname" style="display: none">
        <div class="selected @error($name) is-invalid @enderror">
            @if (old($name,request('locationval')) == '')
                {{ $placeholder }}
            @else
                {{ old($name,request('locationval')) }}
            @endif
        </div>
        <div class="search-box">
            <input type="text" name="{{ $searchName }}" placeholder="{{ $searchPlaceholder }}">
        </div>
    </div>
</div>
<x-ajaxerror name="{{$name}}" />
@push('spscripts')
    <script>
        $(document).ready(function() {
            var $container = $('#{{ $id }}');
            var $searchInput = $container.find('input[name="{{ $searchName }}"]');
            var $locationInput = $container.find('input[name="{{ $name }}"]');
            var $optionsContainer = $container.find('.options-container');
            // console.log();
            var $selected = $container.find('.selected');

            $searchInput.on('keyup', function() {
               var query = $(this).val();
                if (query.trim().length == 0) {
                    query = 'xxxxxxxxxxx'
                }
                $.ajax({
                    method: "get",
                    processdata: false,
                    cashe: false,
                    url: "{{ $searchUrl }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'search': query,
                    },
                    success: function(xhr) {
                        var data = xhr.datas;
                        var msg=xhr.msg;
                        var i = 0;
                        $optionsContainer.empty();
                        if (msg=='done') {
                            $.each(data, function(index, val) {
                                var txt2 = $(`<div class="option"><input type="radio" name="category" class="radio" id="${i++}">
                                <label for="${i - 1}" col='${val.colom}'>${val.name}</label> </div>`);
                                $optionsContainer.append(txt2);
                            });

                            $optionsContainer.find('.option, .option label').each(function() {
                                $(this).on('click', function() {
                                    $selected.text($(this).find('label')
                                        .text());
                                    $locationInput.val($(this).find('label')
                                        .text());
                                    $('#colomname').val($(this).find('label')
                                        .attr('col'));
                                    $optionsContainer.toggleClass('active');
                                })
                            });
                        } else {
                            var txt2 = $(`<div class="option"><input type="radio" name="category" class="radio" id="0">
                             <label for="0">{{ $noResultMessage }}</label> </div>`);
                            $optionsContainer.append(txt2);
                        }
                    },
                    error: function(xhr) {
                        console.log("error")
                    }
                });
            });

            $selected.on('click', function() {
                $optionsContainer.toggleClass('active');
            });
        });
    </script>
@endpush
