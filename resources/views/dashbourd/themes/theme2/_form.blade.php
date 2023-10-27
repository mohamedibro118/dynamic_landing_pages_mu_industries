<div class="row my-3" style="justify-content: center">
    <div class="col-md-8 "><input class="form-control" type="text" name="page_title" style="text-align: center"
            value="{{ $page?->title ?? '' }}" placeholder="Page Title" required></div>
</div>
<div class="row" style="justify-content: center">
    <x-input-wedgits.pageSitting :page="$page" />
</div>
<div class="accordion my-3" id="accordionPanelsStayOpenExample">

    {{-- header section --}}
    <div class="accordion-item ">
        <input type="hidden" name="sections['header']" value="header">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Header Section
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[header][bg_header]" caller="header" :value="$colors->firstWhere('identifier', 'bg_header')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('header', $sections?->pluck('identifier')->toArray() ?? ['header'])) value=""
                        id="flexCheckCheckedheader">
                    <label class="form-check-label" for="flexCheckCheckedheader">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="col-md-4 mt-2">
                    <x-bladewind.filepicker label="Header Logo" required=true name="logos[header][logo_header]"
                        placeholder="{{ __('choose your Logo') }}" id="headerlogo" :url="asset($logos->firstWhere('identifier', 'logo_header')?->logo ?? null)" min_width="100"
                        min_height="90" sheight="250px" />
                </div>
            </div>
        </div>
    </div>
    {{-- Landing section  1 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['landing']" value="landing">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
                Landing section #1
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[landing][bg_landing]" caller="landing" :value="$colors->firstWhere('identifier', 'bg_landing')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('landing', $sections?->pluck('identifier')->toArray() ?? ['landing'])) value=""
                        id="flexCheckCheckedlanding">
                    <label class="form-check-label" for="flexCheckCheckedlanding">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">


                <div class="col-md-4 mt-2">
                    <x-bladewind.filepicker label="Landing background" required=true
                        name="backgrounds[landing][bg_landing]" placeholder="{{ __('choose your Logo') }}"
                        id="landing_background" :url="asset($backgrounds->firstWhere('identifier', 'bg_landing')?->image_url ?? null)" min_width="1920" min_height="1080" sheight="250px" />
                </div>
                <div class="col-md-8  mt-2">
                    <x-input-wedgits.description label="landing Title" name="descriptions[landing][title_landing]"
                        sheight='250' id="description_sec1_title" :value="$descriptions->firstWhere('identifier', 'title_landing')?->description ?? null" />
                </div>

                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header" style="justify-content: space-between">
                            <div class="form-check">
                                <x-input-wedgits.color-picker name="colors[landing][cta_landing]" caller="landing_cta"
                                    :value="$colors->firstWhere('identifier', 'cta_landing')?->color ?? null" />
                            </div>
                            <h5 class="card-title text-center">Choose Call To Action On This Section</h5>
                        </div>
                        <div class="card-body">
                            <x-input-wedgits.ctainputs id="about_cta" name="cta[landing][]" :ctas="$ctas->firstWhere('identifier', 'landing') ?? null" />
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    {{-- about section  1 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['about']" value="about">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseAbout" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseAbout">
                About Project section #1
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[about][bg_about]" caller="about_bg" :value="$colors->firstWhere('identifier', 'bg_about')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('about', $sections?->pluck('identifier')->toArray() ?? ['about'])) value=""
                        id="flexCheckCheckedabout">
                    <label class="form-check-label" for="flexCheckCheckedabout">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseAbout" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">
                <div class="col-md-6  mt-2">
                    <x-input-wedgits.description label="About Project" name="descriptions[about][about_project]"
                        sheight="350" id="description_about" :value="$descriptions->firstWhere('identifier', 'about_project')?->description ?? null" />
                </div>
                <div class="col-md-6 ">
                    <x-input-wedgits.gallary label="project gallary" name="gallary[about][]" id="project_gallary"
                        :path="$gallary->firstWhere('identifier', 'about')?->gallary ?? null" />
                </div>
            </div>
        </div>
    </div>
    {{-- heading section  1 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['heading']" value="heading">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseHeading" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseHeading">
                Heading Project section #1
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[heading][bg_heading]" caller="heading_bg"
                    :value="$colors->firstWhere('identifier', 'bg_heading')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('heading', $sections?->pluck('identifier')->toArray() ?? ['heading'])) value=""
                        id="flexCheckCheckedheading">
                    <label class="form-check-label" for="flexCheckCheckedheading">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseHeading" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">
                <div class="col-md-4">
                    <x-bladewind.filepicker label="Heading Background" required=true
                        name="backgrounds[landing][bg_landing]" placeholder="{{ __('choose your Logo') }}"
                        id="heading_l" :url="asset($photos->firstWhere('identifier', 'heading_photo')?->photo ?? null)" min_width="1920" min_height="1080" sheight="250px" />
                </div>
                <div class="col-md-6">
                    <x-input-wedgits.description label="heading Title" name="descriptions[heading][title_heading]"
                        sheight='250' id="description_heading_title" :value="$descriptions->firstWhere('identifier', 'title_heading')?->description ?? null" />
                </div>
            </div>
        </div>
    </div>
    {{-- Units Section  2 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['units']" value="units">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
                Units Section #2
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[units][bg_units]" caller="units_bg" :value="$colors->firstWhere('identifier', 'bg_units')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('units', $sections?->pluck('identifier')->toArray() ?? ['units'])) value=""
                        id="flexCheckCheckedunits">
                    <label class="form-check-label" for="flexCheckCheckedunits">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
                <x-input-wedgits.units :units="$units" section="units" theme="theme2" :unitTypes="$unitTypes" />
                <div class="row">
                    <div class="form-check" style="">
                        <label for="">choose color for cta to units</label>
                        <x-input-wedgits.color-picker name="colors[units][cta_units]" caller="units_cta"
                            :value="$colors->firstWhere('identifier', 'cta_units')?->color ?? null" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- location section  1 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['location']" value="location">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapselocation" aria-expanded="false"
                aria-controls="panelsStayOpen-collapselocation">
                location section #1
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[location][bg_location]" caller="location_bg"
                    :value="$colors->firstWhere('identifier', 'bg_location')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('location', $sections?->pluck('identifier')->toArray() ?? ['location'])) value=""
                        id="flexCheckCheckedlocation">
                    <label class="form-check-label" for="flexCheckCheckedlocation">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapselocation" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">

                <div class="col-md-6">
                    <x-bladewind.filepicker label="Location Section Photo" required=true
                        name="photos[location][location_photo]" placeholder="{{ __('choose your Logo') }}"
                        id="location_l" :url="asset($photos->firstWhere('identifier', 'location_photo')?->photo ?? null)" min_width="1000" min_height="750" sheight="250px" />
                </div>
            </div>
        </div>
    </div>
    {{-- contact form   --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['contactForm']" value="contactForm">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapsecontactForm" aria-expanded="false"
                aria-controls="panelsStayOpen-collapsecontactForm">
                contactForm section #1
            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[contactForm][bg_contactForm]" caller="contactForm_bg"
                    :value="$colors->firstWhere('identifier', 'bg_contactForm')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('contactForm', $sections?->pluck('identifier')->toArray() ?? ['contactForm'])) value=""
                        id="flexCheckCheckedcontactForm">
                    <label class="form-check-label" for="flexCheckCheckedcontactForm">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapsecontactForm" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">
                <div class="col-md-6 ">
                    <x-input-wedgits.description label="contactForm Section Header"
                        name="descriptions[contactForm][contactForm-sec]" sheight="250" id="description_contactForm"
                        :value="$descriptions->firstWhere('identifier', 'contactForm-sec')?->description ?? null" />
                </div>
                <div class="col-md-6">
                    <x-bladewind.filepicker label="contactForm Section Photo" required=true
                        name="photos[contactForm][contactForm_photo]" placeholder="{{ __('choose your Logo') }}"
                        id="contactForm_l" :url="asset($photos->firstWhere('identifier', 'contactForm_photo')?->photo ?? null)" min_width="1000" min_height="750" sheight="250px" />
                </div>
            </div>
        </div>
    </div>
    {{-- footer Section --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['footer']" value="footer">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFooter" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFooter">
                Footer Section #3

            </button>
            <div class="form-check"
                style="position: absolute; top: 50%;left: 200px; transform: translateY(-50%);z-index: 9;">
                <x-input-wedgits.color-picker name="colors[footer][bg_footer]" caller="footer" :value="$colors->firstWhere('identifier', 'bg_footer')?->color ?? null" />
            </div>
            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" value="" @checked(!in_array('footer', $sections?->pluck('identifier')->toArray() ?? ['footer']))
                        id="flexCheckCheckedfooter">
                    <label class="form-check-label" for="flexCheckCheckedfooter">
                        Hidden
                    </label>
                </h6>
            </div>


        </h2>
        <div id="panelsStayOpen-collapseFooter" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="col-md-12  mt-2">
                    <x-input-wedgits.description label="Footer Description" name="descriptions[footer][desc_footer]"
                        sheight="150" id="description_footer" :value="$descriptions->firstWhere('identifier', 'desc_footer')?->description ?? null" />
                </div>
            </div>
        </div>
    </div>

    {{-- google codes --}}
    <div class="row my-5" style="justify-content: center">
        <x-input-wedgits.googleCode :page="$page" />
    </div>

</div>

@push('spscripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.form-check-input', function(e) {
                const isChecked = $(this).is(':checked');
                const accordionItem = $(this).closest('.accordion-item');
                const collapseElement = accordionItem.find('.accordion-collapse');
                const formInputs = accordionItem.find('button, input, select, textarea').not(this);

                if (isChecked) {
                    collapseElement.collapse('hide');
                    formInputs.prop('disabled', true);
                    accordionItem.find('.accordion-header').css('background-color', 'red');
                    accordionItem.find('.accordion-button').css('background-color', 'red');
                } else {
                    collapseElement.collapse('show');
                    formInputs.prop('disabled', false);
                    accordionItem.find('.accordion-header').css('background-color', '');
                    accordionItem.find('.accordion-button').css('background-color', '');
                }
            });
        });
    </script>
@endpush
