@push('links')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Real Estate Landing Page</title>
    <link href="{{ asset('vendorbwind/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendorbwind/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendorbwind/bladewind/js/helpers.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('plugins/last_bootstrap/css/bootstrap.min.css') }}"> --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/theme3/assets/css/theme.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/theme3/assets/css/loopple.css') }}">
@endpush

<x-theme-layout>
    {{-- hesder --}}
    <div style="
     background-color: {{ $colors->firstWhere('identifier', 'bg_header')?->color ?? null }}
     ">
        <nav class="navbar navbar-expand-lg bg-transparent py-3 shadow-none">
            <div class="container">
                <a class="navbar-brand w-8" href="#" data-config-id="brand">
                    <img src="{{ asset($logos->firstWhere('identifier', 'logo_header')?->logo ?? null) }}"
                        style="width: 120px; height:70px" class="u-logo-image u-logo-image-1">
                </a>

                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

                </div>
            </div>
        </nav>
    </div>

    {{-- landing --}}
    <header class="">
        <div class="page-header min-vh-50 m-3 p-4 border-radius-xl py-9"
            style="background-image: url({{ asset($backgrounds->firstWhere('identifier', 'bg_landing')?->image_url ?? null) }}">
            <span class="mask bg-gradient-dark opacity-7"></span>
            <div class="container h-100">
                <div class="row">
                    <div class="col-lg-5 mt-auto justify-content-bottom my-auto">
                        {!! $descriptions->firstWhere('identifier', 'desc_landing')?->description ?? null !!}
                        <div style="display:flex ;justify-content: flex-start; ">
                            <x-front-wedgits.display-cta :ctas="$ctas" section="landing" :page="$page"
                                :color="$colors->firstWhere('identifier', 'cta_landing')?->color ?? null" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- more descriptions --}}
    <section class="py-5"
        style="
      background-color: {{ $colors->firstWhere('identifier', 'bg_details')?->color ?? null }}">
        <div class="container">
            <div class="row text-center" style="justify-content: center">
                <div class="col-12">
                    <h3 class="mb-5" spellcheck="false">More Details</h3>
                </div>
                @foreach ($features as $feature)
                    @if ($feature->section->identifier === 'details')
                        <div class="col-lg-3 col-md-6">
                            <div class="info bg-white shadow-lg p-4 border-radius-lg">
                                <div class="icon icon-shape mx-auto">
                                    <svg class="text-warning" width="25px" height="25px" viewBox="0 0 42 42"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>box-3d-50</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                        <path class="color-foreground"
                                                            d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                        </path>
                                                        <path class="color-background"
                                                            d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                            opacity="0.7"></path>
                                                        <path class="color-background"
                                                            d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                            opacity="0.7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    {{-- <div style="width: 100%"></div> --}}
                                </div>
                                {!! $feature->description !!}
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </section>
    {{-- units --}}
    <section class="py-6 bg-gray-100"
        style="background-color: {{ $colors->firstWhere('identifier', 'bg_units')?->color ?? null }}">
        <div class="container">
            <div class="row mb-4" style="justify-content: center">
                <div class="col-12 text-center">
                    <h3 class="mb-5" spellcheck="false">View Properties</h3>
                </div>

                {{-- unitcard --}}
                @foreach ($units as $unit)
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <a href="javascript:;" class="d-block">
                                    <img src="{{ asset($unit->img_url) }}" class="img-fluid border-radius-lg shadow">
                                </a>
                            </div>

                            <div class="card-body pt-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="javascript:;"
                                            class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                            {!! $unit->price !!}
                                        </a>
                                        <p class="card-description mb-4 text-sm">
                                            {{-- {{ _('Start')}} --}}
                                            Start
                                        </p>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:;" class="btn btn-link text-dark p-0">
                                            {!! $unit->type !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0"
                                                aria-hidden="true"></i>
                                            <div class="ms-3">
                                                <p class="text-xs mb-0">Surface</p>
                                                <h6 class="font-weight-bolder mb-0">{{ $unit->surface }}m
                                                    <small
                                                        class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-bed text-gradient text-warning text-lg mb-0"
                                                aria-hidden="true"></i>
                                            <div class="ms-3">
                                                <p class="text-xs mb-0">Bedrooms</p>
                                                <h6 class="font-weight-bolder mb-0">{{ $unit->bedrooms }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-bath text-gradient text-warning text-lg mb-0"
                                                aria-hidden="true"></i>
                                            <div class="ms-3">
                                                <p class="text-xs mb-0">Bathrooms</p>
                                                <h6 class="font-weight-bolder mb-0">{{ $unit->bathrooms }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 text-center my-3">
                    <div style="display:flex ;justify-content: center;margin-top: 30px;">
                        <x-front-wedgits.display-cta :ctas="$ctas" section="footer" :page="$page"
                            :color="$colors->firstWhere('identifier', 'cta_units')?->color ?? null" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- features --}}
    <section class="pt-5 pb-0"
        style="
      background-color: {{ $colors->firstWhere('identifier', 'bg_features')?->color ?? null }}">
        <div class="container">
            <div class="row" style="justify-content: center">
                <div class="col-12 text-center">
                    <h3 class="mb-5" spellcheck="false">Project Features</h3>
                </div>
                @foreach ($features as $feature)
                    @if ($feature->section->identifier === 'features')
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block blur-shadow-image">
                                        <img src="{{ asset($feature->icon_url) }}" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-lg">
                                    </a>
                                </div>
                                <div class="card-body px-1 pt-3">
                                    {!! $feature->description !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- heading --}}
    <section class="my-5 py-5 bg-gradient-dark position-relative"
        style="background-image:url({{ asset($photos->firstWhere('identifier', 'heading_photo')?->photo ?? null) }});
        ;background-color: {{ $colors->firstWhere('identifier', 'bg_heading')?->color ?? null }};
        background-position:center;
        ">
        <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container position-relative z-index-2">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto text-start">
                    {!! $descriptions->firstWhere('identifier', 'title_heading')?->description ?? null !!}
                </div>
                <div class="col-lg-6 m-auto">
                    <div class="row">
                        <div class="col-sm-4 col-6 ps-sm-0 ms-auto">
                            <button type="button" onclick="showModal('tnc-agreement')"
                                class="btn bg-gradient-warning mb-0 ms-lg-3 ms-sm-2 mb-sm-0 mb-2 me-auto w-100 d-block">More
                                Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <footer class="footer py-5"
        style="background-color: {{ $colors->firstWhere('identifier', 'bg_units')?->color ?? null }}">
        <div class="container">
            <div class="row" style="justify-content: center">
                <div class="mb-8 mb-lg-0">
                    {!! $descriptions->firstWhere('identifier', 'desc_footer')?->description ?? null !!}
                    <div style="display:flex ;justify-content: center;margin-top: 30px;">
                        <x-front-wedgits.display-cta :ctas="$ctas" section="footer" :page="$page"
                            :color="$colors->firstWhere('identifier', 'cta_footer')?->color ?? null" />
                    </div>
                </div>
            </div>
            <hr class="horizontal dark mt-lg-5 mt-4 mb-sm-4 mb-1">
            <div class="row"
                style="background-color: {{ $colors->firstWhere('identifier', 'bg_units')?->color ?? null }}">
                <div class="col-8 mx-lg-auto text-lg-center">
                    <p class="text-sm text-secondary">
                        Copyright © 2023 Soft &amp;wzgate.
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <x-bladewind.modal name="tnc-agreement" backdrop_can_close="false" ok_button_label=""
        center_action_buttons="true">
        <x-front-wedgits.contact-form :page="$page" />
    </x-bladewind.modal>
    @push('scripts')
        {{-- <script src="https://loopple.s3.eu-west-3.amazonaws.com/soft-ui-design-system/js/core/bootstrap.min.js"
            type="text/javascript"></script>
        <script src="https://demos.creative-tim.com/soft-ui-design-system/assets/js/soft-design-system.min.js?v=1.0.5"
            type="text/javascript"></script>
        <script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/countup.min.js"
            type="text/javascript"></script>
        <script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/flatpickr.min.js"></script> --}}
        <script>
            if (document.getElementById("state1")) {
                const countUp = new CountUp("state1", document.getElementById("state1").getAttribute("countTo"));
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            }
            if (document.getElementById("state2")) {
                const countUp1 = new CountUp("state2", document.getElementById("state2").getAttribute("countTo"));
                if (!countUp1.error) {
                    countUp1.start();
                } else {
                    console.error(countUp1.error);
                }
            }
            if (document.getElementById("state3")) {
                const countUp2 = new CountUp("state3", document.getElementById("state3").getAttribute("countTo"));
                if (!countUp2.error) {
                    countUp2.start();
                } else {
                    console.error(countUp2.error);
                };
            }

            if (document.querySelector('.datepicker-1')) {
                flatpickr('.datepicker-1', {}); // flatpickr
            }

            if (document.querySelector('.datepicker-2')) {
                flatpickr('.datepicker-2', {}); // flatpickr
            }
        </script>
    @endpush
</x-theme-layout>
