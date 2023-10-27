@props(['gallary','width'=>'100%', 'height'=>'auto'])
<!-- Carousel wrapper -->

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="padding-top: 20px">
    <div class="carousel-inner">
        @foreach (json_decode($gallary->firstWhere('identifier', 'about')?->gallary)??[] as $image)
            <div class="carousel-item sliderc">
                <img src="{{ asset($image) }}" class="d-block w-100" alt="..." style="min-width: {{$width}};min-height: {{$height}}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel wrapper -->
@push('sscripts')
    <script>
        $(document).ready(function() {
            $('.sliderc').first().toggleClass('active');

        })
    </script>
@endpush
