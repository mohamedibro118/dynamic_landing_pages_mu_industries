@props(['units', 'page','color'=>'black'])

<div class="container">
    <ul class="nav nav-pills justify-content-center my-5" id="pills-tab" role="tablist">
        <!-- Create a tab for each unique type -->
        @foreach ($units->pluck('type')->unique() as $type)
            <li class="nav-item mx-1" role="presentation">
                <button class="teco nav-link shadow" style="border:none"
                    id="pills-{{ preg_replace('/\s+/', '_', $type) }}-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-{{ preg_replace('/\s+/', '_', $type) }}-content" type="button"
                    role="tab" aria-controls="pills-{{ preg_replace('/\s+/', '_', $type) }}-content"
                    aria-selected="true">{{ $type }}</button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- Create a tab pane for each unique type -->
        @foreach ($units->pluck('type')->unique() as $type)
            <div class="tecop tab-pane" id="pills-{{ preg_replace('/\s+/', '_', $type) }}-content" role="tabpanel"
                aria-labelledby="pills-{{ preg_replace('/\s+/', '_', $type) }}-tab">
                <!-- Loop through units of the current type -->
                <!-- Center-align the units horizontally within each tab pane -->
                <div class="row d-flex justify-content-center">
                    @foreach ($units->where('type', $type) as $unit)
                        <div class="col-md-4">
                            <x-front-wedgits.unitCard :unit="$unit" :mobile="$page->mobile" :whats="$page->whats" color="{{$color}}" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('sscripts')
    <script>
        $(document).ready(function() {
            $('.teco').first().toggleClass('active');
            $('.tecop').first().toggleClass('show active');
        })
    </script>
@endpush
