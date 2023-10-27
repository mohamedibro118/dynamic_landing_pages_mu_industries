<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wzgate|Landing Generation & marketing</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/dist/css/style.css') }}">
    <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand" style="width: 120px;height: 100px;">
                        <h1 class="m-0" style="width: 120px;height: 100px;">
                            <a href="#" style="width: 120px;height: 100px;">
                                <img class="header-logo-image" src="{{ asset('WzGate_White.svg') }}" alt="Logo">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
                        <div class="hero-copy">
                            <h1 class="hero-title mt-0">Start Landing Generation & Marketing</h1>
                            <p class="hero-paragraph">Our landing page template works on all devices, so you only have
                                to set it up once, and get beautiful results forever.</p>
                            <div class="hero-cta"><a class="button button-primary"
                                    href="{{ route('dashbourd') }}">GO</a></div>
                        </div>
                        <div class="hero-figure anime-element">
                            <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                                <rect width="528" height="396" style="fill:transparent;" />
                            </svg>
                            <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                            <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                            <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                            <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                            <div class="hero-figure-box hero-figure-box-05"></div>
                            <div class="hero-figure-box hero-figure-box-06" style="
                            display: flex;justify-content: center;align-items: center">
                                <h1 class="m-0" style="width: 120px;height: 100px;">
                                    <a href="#" style="width: 120px;height: 100px;">
                                        <img class="header-logo-image" src="{{ asset('WzGate_White.svg') }}"
                                            alt="Logo">
                                    </a>
                                </h1>
                            </div>
                            <div class="hero-figure-box hero-figure-box-07"></div>
                            <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                            <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                            <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('home/dist/js/main.min.js') }}"></script>
</body>

</html>
