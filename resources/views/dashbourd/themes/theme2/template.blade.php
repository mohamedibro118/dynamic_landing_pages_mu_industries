@push('links')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="real estate marketing">
    <meta name="description" content="">
    <title>{{ $page?->title ?? '' }}</title>
    <link href="{{ asset('vendorbwind/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('plugins/last_bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/cartproperties.css') }}" />
    <script src="{{ asset('vendorbwind/bladewind/js/helpers.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Crimson Text', serif !important;
        }
    </style>
@endpush

<x-theme-layout>

    <div>
        <!-- As a link -->
        {{-- header --}}
        @if (in_array('header', $section_names))
            <div class="row " style="">
                <!-- As a heading -->
                <nav style="padding: 0px !important" class="navbar navbar-light bg-light">
                    <div class="container-fluid"
                        style="display: flex;justify-content: center;background-color: {{ $colors->firstWhere('identifier', 'bg_header')?->color ?? null }}">
                        <span class="navbar-brand mb-0 h1 text-center" style="margin:0px"> <a href="#"
                                class="u-image u-logo u-image-1">
                                <img src="{{ asset($logos->firstWhere('identifier', 'logo_header')?->logo ?? null) }}"
                                    style="width:140px; height:80px" class="">
                            </a></span>
                    </div>
                </nav>
                <div
                    style="display: flex; justify-content: center; align-items: flex-start; padding: 0px; margin: 0px;background: transparent;z-index: 9;">
                    <svg style="width:30 px; height: 80px; margin-top: -33px; padding-top: 0px" viewBox="0 0 15 15"
                        fill="none" xmlns="http://www.w3.org/2000/svg"
                        transform="matrix(1, 0, 0, 1, 0, 0) rotate(270)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M9 4L9 11L4.5 7.5L9 4Z"
                                fill="{{ $colors->firstWhere('identifier', 'bg_header')?->color ?? null }}"></path>
                        </g>
                    </svg>
                </div>


            </div>
        @endif

        {{-- landing --}}
        @if (in_array('landing', $section_names))
            <div class="landing"
                style="margin-top:-47px;
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url({{ asset($backgrounds->firstWhere('identifier', 'bg_landing')?->image_url ?? null) }});
            ;background-color: {{ $colors->firstWhere('identifier', 'bg_landing')?->color ?? null }}">
                <div class="container">
                    <div class="row">
                        <div class="col-12 landing-content">{!! $descriptions->firstWhere('identifier', 'title_landing')?->description ?? null !!}</div>
                        <div class="col-12 landing-content">
                            <x-front-wedgits.display-cta :ctas="$ctas" section="landing" :page="$page" :color="$colors->firstWhere('identifier', 'cta_landing')?->color ?? null"/>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- about --}}
        @if (in_array('about', $section_names))
            <div class=" container "
                style="margin-top: 50px;;background-color: {{ $colors->firstWhere('identifier', 'bg_about')?->color ?? null }}">
                <div class="row">
                    <div class="col-md-6 order-2 order-md-1">
                        {!! $descriptions->firstWhere('identifier', 'about_project')?->description ?? null !!}
                    </div>
                    <div class="col-md-6 text-center  order-1 order-md-2 my-5 my-md-0">
                        <x-front-wedgits.carsoulGallary :gallary="$gallary" height="510px" />
                    </div>
                </div>

            </div>
        @endif

        {{-- heading sextion --}}
        @if (in_array('heading', $section_names))
            <div class="heading"
                style="margin-top:40px;
           background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url({{ asset($photos->firstWhere('identifier', 'heading_photo')?->photo ?? null) }});
           ;background-color: {{ $colors->firstWhere('identifier', 'bg_heading')?->color ?? null }}
           ">
                <div>
                    {!! $descriptions->firstWhere('identifier', 'title_heading')?->description ?? null !!}
                </div>

            </div>
        @endif

        {{-- units --}}
        @if (in_array('units', $section_names))
            <div class="container my-5"
                style="background-color: {{ $colors->firstWhere('identifier', 'bg_header')?->color ?? null }}">
                <div class="row">
                    <div class="col-12 mt-3 mb-5">
                        <h1 class="text-center">Available Units</h1>
                    </div>
                    <div class="col-12">
                        <div class="row gx-5">
                            @foreach ($units as $unit)
                                <div class="col-md-6 my-3 ">
                                    <div class="card text-center border-0">
                                        <div class="card-header">
                                            <h2 style="text-transform: capitalize">{{ $unit->type }}</h2>
                                        </div>
                                        <img src="{{ $unit->img_url }}" style="height: 350px"
                                            class="card-img rounded-0" alt="...">
                                        <div class="card-body">
                                            {!! $unit->description !!}
                                        </div>
                                        <div class="card-footer text-muted">
                                            <x-front-wedgits.ctaUnit :phone="$page?->mobile" :whats="$page?->whats" url=""
                                                style="display: flex;flex-wrap:nowrap;justify-content: center;" :color="$colors->firstWhere('identifier', 'cta_units')?->color ?? null" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        @endif

        {{-- location --}}
        @if (in_array('location', $section_names))
            <div style="background-color: {{ $colors->firstWhere('identifier', 'bg_location')?->color ?? null }}">
                <div class="container my-5 pb-3 ">
                    <div class="row">
                        <div class="col-12 mt-3 mb-5">
                            <h1 class="text-center">Location</h1>
                        </div>
                        <div class="col-12">
                            <x-front-wedgits.displayImg :path="$photos->firstWhere('identifier', 'location_photo')?->photo ?? null" height="549px" />
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- contact form --}}
        <div class=""
            style="
         background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url({{ asset($photos->firstWhere('identifier', 'contactForm_photo')?->photo ?? null) }});
         ;background-color: {{ $colors->firstWhere('identifier', 'bg_contactForm')?->color ?? null }}
             ">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 mt-3 mb-5">
                        <h1 class="text-center">Contact Form</h1>
                    </div>
                    <div class="col-12">
                        <x-front-wedgits.contact-form :page="$page" :title="$descriptions->firstWhere('identifier', 'contactForm-sec')?->description ?? null" />
                    </div>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <footer>
            <div style="position: relative; height: 80px;display: flex;align-items: center
            ;background-color: {{ $colors->firstWhere('identifier', 'bg_footer')?->color ?? null }}
            ">
                <svg style="width: 40px; height: 30px; position: absolute; top: -17px; left: 50%; transform: translate(-50%);"
                    viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier" transform="rotate(90, 7.5, 7.5)">
                        <path d="M9 4L9 11L4.5 7.5L9 4Z" fill="{{ $colors->firstWhere('identifier', 'bg_footer')?->color ?? null }}"></path>
                    </g>
                </svg>
                <div class="container" style="display: flex; justify-content: space-between ;align-items: center
                 
                ">
                    <div class="col-md-12">
                        {!! $descriptions->firstWhere('identifier', 'desc_footer')?->description ?? null !!}
                    </div>

                </div>
            </div>

        </footer>
    </div>

    @push('scripts')
        <script class="u-script" type="text/javascript" src="{{ asset('assets/theme1/js/jquery.js') }}"></script>
        <script src="{{ asset('plugins/last_bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @endpush
</x-theme-layout>
