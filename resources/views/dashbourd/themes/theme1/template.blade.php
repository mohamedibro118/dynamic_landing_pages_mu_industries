@push('links')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="real estate marketing">
    <meta name="description" content="">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="{{ asset('assets/theme1/intlTelInput/') }}">
    <title>{{ $page?->title ?? '' }}</title>


    <link rel="stylesheet" href="{{ asset('plugins/last_bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/theme1/css/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/theme1/css/Home.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/theme1/css/cartproperties.css') }}" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link href="{{ asset('vendorbwind/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendorbwind/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendorbwind/bladewind/js/helpers.js') }}"></script>
@endpush

<x-theme-layout>
    @php
        $arabicPattern = '/[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]+/u';
    @endphp
    {{-- header --}}
    @if (in_array('header', $section_names))
        <header class="u-clearfix u-header u-header" id="sec-e71f"
            style="background-color: {{ $colors->firstWhere('identifier', 'bg_header')?->color ?? null }}">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1 " style="padding-bottom: 5px;padding-left: 20px">
                <a href="#" class="u-image u-logo u-image-1">
                    <img src="{{ asset($logos->firstWhere('identifier', 'logo_header')?->logo ?? null) }}"
                        style="width: 120px; height:70px" class="u-logo-image u-logo-image-1">
                </a>

            </div>
        </header>
    @endif
    {{-- landing --}}
    @if (in_array('landing', $section_names))
        <section class="u-clearfix u-image u-shading u-section-1" id="carousel_d30e"
            style="background-image: linear-gradient(0deg, rgba(0,0,0,0.05), rgba(0,0,0,0.05)), url({{ asset($backgrounds->firstWhere('identifier', 'bg_landing')?->image_url ?? null) }})
            ;background-color: {{ $colors->firstWhere('identifier', 'bg_landing')?->color ?? null }}">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-col">
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                                        <div class="u-container-layout u-container-layout-1">
                                            <img src="{{ asset($logos->firstWhere('identifier', 'logo_project')?->logo ?? null) }}"
                                                alt="" style="width:130px; height:90px"
                                                class="u-image-default u-image-1">
                                        </div>
                                    </div>
                                    <div
                                        class="u-align-right u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                                        <div class="u-container-layout u-container-layout-2">
                                            <h4 class="u-text u-text-1">{{ $page?->title ?? '' }}</h4>
                                            <div class="u-border-10 u-border-white u-line u-line-horizontal u-line-1"
                                                style="text-align:  {{ preg_match($arabicPattern, $page?->title) ? 'right' : 'right' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-layout-cell u-left-cell u-right-cell u-size-60 u-layout-cell-3">
                                        <div class="u-container-layout u-container-layout-3 ">
                                            {!! $descriptions->firstWhere('identifier', 'desc_landing')?->description ?? null !!}
                                            <div style="display:flex ;justify-content: center; ">
                                                <x-front-wedgits.display-cta :ctas="$ctas" section="landing"
                                                    :page="$page" :color="$colors->firstWhere('identifier', 'cta_landing')?->color ?? 'yellow'" />
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- about --}}
    @if (in_array('about', $section_names))
        <section style="background-color: {{ $colors->firstWhere('identifier', 'bg_about')?->color ?? null }}"
            class="u-black u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-clearfix u-section-3"
            id="carousel_f286">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-row">
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-image u-layout-cell u-left-cell u-size-60 u-image-1">
                                        <div class="u-container-layout u-container-layout-1">
                                            <x-front-wedgits.carsoulGallary :gallary="$gallary" height="510px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-col">
                                    <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-2">
                                        <div class="u-container-layout u-container-layout-2">
                                            {!! $descriptions->firstWhere('identifier', 'about_project')?->description ?? null !!}
                                            <div class="u-border-10 u-border-white u-line u-line-horizontal u-line-1"
                                                style="text-align:  {{ preg_match($arabicPattern, $descriptions->firstWhere('identifier', 'about_project')?->description) ? '30px 0px 25px auto' : '30px auto 25px 0px' }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- location section --}}
    @if (in_array('location', $section_names))
        <section class="u-clearfix u-palette-5-dark-1 u-section-4" id="carousel_9ae0"
            style="background-color: {{ $colors->firstWhere('identifier', 'bg_location')?->color ?? null }}">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-container-layout-1">
                                    {!! $descriptions->firstWhere('identifier', 'title_location')?->description ?? null !!}
                                    <div class="u-border-10 u-border-white u-line u-line-horizontal u-line-1"
                                        style="margin:  {{ preg_match($arabicPattern, $descriptions->firstWhere('identifier', 'title_location')?->description) ? '30px 0px 25px auto' : '30px auto 25px 0px' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                                <div class="u-container-layout u-valign-middle u-container-layout-2">
                                    {!! $descriptions->firstWhere('identifier', 'desc_location')?->description ?? null !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- units --}}
    @if (in_array('units', $section_names))
        <section class="u-clearfix u-grey-5 u-section-5" id="carousel_25d3"
            style="background-color: {{ $colors->firstWhere('identifier', 'bg_units')?->color ?? null }}">
            <div class="u-clearfix u-sheet u-sheet-1">
                <x-front-wedgits.unitsWithAsTaps :units="$units" :page="$page" :color=" $colors->firstWhere('identifier', 'cta_units')?->color ?? null " />
            </div>
        </section>
    @endif
    {{-- feature section --}}
    @if (in_array('features', $section_names))
        <section style="background-color: {{ $colors->firstWhere('identifier', 'bg_features')?->color ?? null }}"
            class="u-clearfix u-grey-5 u-section-6" id="carousel_6bb2" style="padding-bottom: 30px">
            <div class="container-fluid u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-gutter-30 u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-size-30">
                                <div class="u-layout-row">
                                    <div
                                        class="u-container-style u-image u-layout-cell u-left-cell u-size-60 u-image-1">
                                        <div class="u-container-layout u-container-layout-1">
                                            <x-front-wedgits.displayImg :path="$photos->firstWhere('identifier', 'feature_photo')?->photo ??
                                                null" height="549px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="u-size-30">
                                <div class="u-layout-col">
                                    @foreach ($features as $feature)
                                        <div
                                            class="u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-2">
                                            <div class="d-flex justify-content-first align-items-start "
                                                style="flex-wrap: nowrap;gap: 20px">
                                                <span class="u-icon u-icon-circle u-palette-5-dark-1 u-icon-1 "><svg
                                                        class="u-svg-link" preserveAspectRatio="xMidYMin slice"
                                                        viewBox="0 0 512 512" style="">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="#svg-2288">
                                                        </use>
                                                    </svg><svg class="u-svg-content" viewBox="0 0 512 512" x="0px"
                                                        y="0px" id="svg-2288"
                                                        style="enable-background:new 0 0 512 512;">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg></span>
                                                <div style="padding-top: 10px">{!! $feature->description !!}</div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- footer --}}
    @if (in_array('footer', $section_names))
        <section style="background-color: {{ $colors->firstWhere('identifier', 'bg_footer')?->color ?? null }}"
            class="u-clearfix u-palette-5-dark-1 u-section-8">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-row">
                            <div
                                class="u-container-style u-layout-cell u-left-cell u-right-cell u-size-60 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3" style="padding-bottom: 50px">
                                    <p class="u-text u-text-4 text-center">
                                        <b>Phone:</b> {{ $page->mobile }}<br><b>Email:</b>
                                        {{ $page->email }}
                                    </p>
                                    {!! $descriptions->firstWhere('identifier', 'desc_footer')?->description ?? null !!}
                                    <div style="display:flex ;justify-content: center;margin-top: 30px;">
                                        <x-front-wedgits.display-cta :ctas="$ctas" section="footer"
                                            :page="$page" :color="$colors->firstWhere('identifier', 'cta_footer')?->color ?? 'yellow'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif



    <x-bladewind.modal name="tnc-agreement" backdrop_can_close="false" ok_button_label=""
        center_action_buttons="true">
        <x-front-wedgits.contact-form :page="$page" />
    </x-bladewind.modal>


    @push('scripts')
        <script class="u-script" type="text/javascript" src="{{ asset('assets/theme1/js/jquery.js') }}"></script>
        <script src="{{ asset('plugins/last_bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script class="u-script" type="text/javascript" src="{{ asset('assets/theme1/js/nicepage.js') }}"></script>
    @endpush
</x-theme-layout>
