@push('links')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Real Estate Landing Page</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://demos.creative-tim.com/soft-ui-design-system/assets/css/nucleo-svg.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/theme3/assets/css/theme.css')}}">
<link rel="stylesheet" href="{{asset('assets/theme3/assets/css/loopple.css')}}">
@endpush

<x-theme-layout>
    {{-- header --}}
    <nav class="navbar navbar-expand-lg bg-transparent py-3 shadow-none">
        <div class="container">
            <a class="navbar-brand w-8" href="#" data-config-id="brand">
                <img src="{{asset('WzGate-Dark.svg')}}" width="80" height="50" alt="">
            </a>

            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
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
     {{-- landing --}}
    <header class="">
        <div class="page-header min-vh-50 m-3 p-4 border-radius-xl py-9" style="background-image: url(https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2075&amp;q=80);">
            <span class="mask bg-gradient-dark opacity-7"></span>
            <div class="container h-100">
                <div class="row">
                    <div class="col-lg-5 mt-auto justify-content-bottom my-auto">

                        <h5 class="text-gradient text-warning fadeIn1 fadeInBottom text-warning mb-0 font-weight-bolder">Houses</h5>
                        <h1 class="text-white fadeIn2 fadeInBottom mb-4 display-4 font-weight-bolder" spellcheck="false">One step closer to your dream house</h1>

                        <a class="btn bg-gradient-warning">Read article</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3 class="mb-5" spellcheck="false">More Details</h3>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info bg-white shadow-lg p-4 border-radius-lg">
                        <div class="icon icon-shape mx-auto">
                            <svg class="text-warning" width="25px" height="25px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                <path class="color-foreground" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                                <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-0">Components</h5>
                        <p>We get insulted by others, lose trust for those We get back.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info bg-white shadow-lg p-4 border-radius-lg">
                        <div class="icon icon-shape mx-auto">
                            <svg class="text-warning" width="25px" height="25px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z" opacity="0.59858631"></path>
                                                <path class="color-foreground" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                                                <path class="color-foreground" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-0">Mix &amp; Match</h5>
                        <p>We get insulted by others, lose trust for those We get back.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info bg-white shadow-lg p-4 border-radius-lg">
                        <div class="icon icon-shape mx-auto">
                            <svg class="text-warning" width="25px" height="25px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>spaceship</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(4.000000, 301.000000)">
                                                <path class="color-foreground" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                                                <path class="color-foreground" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                                                <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                                                <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" id="color-3" opacity="0.598539807"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-0">Design</h5>
                        <p>We get insulted by others, lose trust for those We get back.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info bg-white shadow-lg p-4 border-radius-lg">
                        <div class="icon icon-shape mx-auto">
                            <svg class="text-warning" width="25px" height="25px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743">
                                                </path>
                                                <path class="color-foreground" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-0">Payment</h5>
                        <p>We get insulted by others, lose trust for those We get back.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6 bg-gray-100">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h3 class="mb-5" spellcheck="false">View Properties for Sale</h3>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1582063289852-62e3ba2747f8?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        320,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        New York, USA
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">230m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">5</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        150,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        London, UK
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">140m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">4</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        450,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        San Francisco, USA
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">350m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">7</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">3</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDZ8fGhvdXNlfGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        260,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        Duluth, USA
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">270m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">4</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">3</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1549517045-bc93de075e53?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8aG91c2V8ZW58MHwwfDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        240,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        New Jersey, USA
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">140m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">5</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80" class="img-fluid border-radius-lg shadow">
                            </a>
                        </div>

                        <div class="card-body pt-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="javascript:;" class="card-title h4 d-block text-darker font-weight-bolder mb-0">
                                        450,000 USD
                                    </a>
                                    <p class="card-description mb-4 text-sm">
                                        San Francisco, USA
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;" class="btn btn-link text-dark p-0">
                                        View details
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-sitemap text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Surface</p>
                                            <h6 class="font-weight-bolder mb-0">500m
                                                <small class="position-absolute text-xs justify-align-top mt-n0">2</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bed text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bedrooms</p>
                                            <h6 class="font-weight-bolder mb-0">10</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-bath text-gradient text-warning text-lg mb-0" aria-hidden="true"></i>
                                        <div class="ms-3">
                                            <p class="text-xs mb-0">Bathrooms</p>
                                            <h6 class="font-weight-bolder mb-0">4</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 mt-5 text-center">
                <a href="javascript" class="btn bg-gradient-dark">View All</a>
            </div>

        </div>
    </section>

    <section class="pt-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="mb-5" spellcheck="false">View Last Article</h3>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/house.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pt-3">
                            <a href="javascript:;">
                                <h5>
                                    Lovely and cosy apartment
                                </h5>
                            </a>
                            <p>
                                Siri's latest trick is offering a hands-free TV viewing experience, that will allow consumers to turn on or off their television, change inputs, fast forward.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">Read article</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/pool.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pt-3">
                            <a href="javascript:;">
                                <h5>
                                    Single room in the center of the city
                                </h5>
                            </a>
                            <p>
                                As Uber works through a huge amount of internal management turmoil, the company is also consolidating and rationalizing more of its international business.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">Read article</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/antalya.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body px-1 pt-3">
                            <a href="javascript:;">
                                <h5>
                                    Independent house bedroom kitchen
                                </h5>
                            </a>
                            <p>
                                Music is something that every person has his or her own specific opinion about. Different people have different taste, and various types of music.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-sm">Read article</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="my-5 py-5 bg-gradient-dark position-relative" style="background-image:url(https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/nastuh.jpg)">
        <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container position-relative z-index-2">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto text-start">
                    <h5 class="text-white mb-lg-0 mb-5">
                        For being a bright color. For standing out. But the time is now to be okay to be the greatest you.
                    </h5>
                </div>
                <div class="col-lg-6 m-auto">
                    <div class="row">
                        <div class="col-sm-4 col-6 ps-sm-0 ms-auto">
                            <button type="button" class="btn bg-gradient-warning mb-0 ms-lg-3 ms-sm-2 mb-sm-0 mb-2 me-auto w-100 d-block">Start Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <h6 class="text-uppercase mb-2">Houses</h6>
                    <p class="mb-4 pb-2">Find your next home.</p>
                    <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                        <span class="text-lg fab fa-facebook" aria-hidden="true"></span>
                    </a>
                    <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                        <span class="text-lg fab fa-twitter" aria-hidden="true"></span>
                    </a>
                    <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                        <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
                    </a>
                    <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                        <span class="text-lg fab fa-pinterest" aria-hidden="true"></span>
                    </a>
                    <a href="javascript:;" class="text-secondary me-xl-4 me-3">
                        <span class="text-lg fab fa-github" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="col-md-2 col-6 ms-lg-auto mb-md-0 mb-4">
                    <h6 class="text-sm">Company</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:void(0);">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Careers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Press
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-2 col-6 mb-md-0 mb-4">
                    <h6 class="text-sm">Pages</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Register
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Add list
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-2 col-6 mb-md-0 mb-4">
                    <h6 class="text-sm">Legal</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Terms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Team
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Privacy
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-2 col-6 mb-md-0 mb-4">
                    <h6 class="text-sm">Resources</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Service
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Product
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="javascript:;">
                                Pricing
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="horizontal dark mt-lg-5 mt-4 mb-sm-4 mb-1">
            <div class="row">
                <div class="col-8 mx-lg-auto text-lg-center">
                    <p class="text-sm text-secondary">
                        Copyright © 2022 Soft &amp; Loopple by Creative Tim.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @push('scripts')
    <script src="https://loopple.s3.eu-west-3.amazonaws.com/soft-ui-design-system/js/core/bootstrap.min.js" type="text/javascript"></script>
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
              flatpickr('.datepicker-1', {
              }); // flatpickr
            } 
        
         if (document.querySelector('.datepicker-2')) {
              flatpickr('.datepicker-2', {
              }); // flatpickr
            }
    </script>
    @endpush
</x-theme-layout>
