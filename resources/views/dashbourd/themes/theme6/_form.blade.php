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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('header',$sections?->pluck('identifier')->toArray()??['header'])) value="" id="flexCheckCheckedheader">
                    <label class="form-check-label" for="flexCheckCheckedheader">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="col-md-4 mt-2">
                    <x-bladewind.filepicker name="logos[header][logo_header]" id="headerlogo" :url="asset($logos->firstWhere('identifier', 'logo_header')?->logo ?? null)"
                        min_width="100" min_height="90" />
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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('landing',$sections?->pluck('identifier')->toArray()??['landing'])) value="" id="flexCheckCheckedlanding">
                    <label class="form-check-label" for="flexCheckCheckedlanding">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">


                <div class="col-md-4 mt-2">
                    <x-input-wedgits.background label="Background" required='false' name="backgrounds[landing][bg_landing]"
                        id="landing_background" :path="$backgrounds->firstWhere('identifier', 'bg_landing')?->image_url ?? null" />
                </div>
                <div class="col-md-4  mt-2">
                    <x-input-wedgits.description label="landing Title" name="descriptions[landing][title_landing]"
                        sheight='200' id="description_sec1_title" :value="$descriptions->firstWhere('identifier', 'title_landing')?->description ?? null" />
                </div>

                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header" style="justify-content: center">
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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('about',$sections?->pluck('identifier')->toArray()??['about'])) value="" id="flexCheckCheckedabout">
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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('heading',$sections?->pluck('identifier')->toArray()??['heading'])) value="" id="flexCheckCheckedheading">
                    <label class="form-check-label" for="flexCheckCheckedheading">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseHeading" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">
                <div class="col-md-4">
                    <x-input-wedgits.general_photo label="Heading Section Background" required=true
                        name="photos[heading][heading_photo]" width="1920" height="500" id="heading_l"
                        :path="$photos->firstWhere('identifier', 'heading_photo')?->photo ?? null" />
                </div>
                <div class="col-md-6  mt-2">
                    <x-input-wedgits.description label="heading Title" name="descriptions[heading][title_heading]"
                        sheight='200' id="description_heading_title" :value="$descriptions->firstWhere('identifier', 'title_heading')?->description ?? null" />
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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('units',$sections?->pluck('identifier')->toArray()??['units'])) value="" id="flexCheckCheckedunits">
                    <label class="form-check-label" for="flexCheckCheckedunits">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
                <x-input-wedgits.units :units="$units" section="units" />
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
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('location',$sections?->pluck('identifier')->toArray()??['location'])) value="" id="flexCheckCheckedlocation">
                    <label class="form-check-label" for="flexCheckCheckedlocation">
                        Hidden
                    </label>
                </h6>
            </div>
        </h2>
        <div id="panelsStayOpen-collapselocation" class="accordion-collapse collapse">
            <div class="row accordion-body" style="align-items: flex-start">
                
                <div class="col-md-6">
                    <x-input-wedgits.general_photo label="Location Section Photo" required=true
                        name="photos[location][location_photo]" width="1000" height="750" id="location_l"
                        :path="$photos->firstWhere('identifier', 'location_photo')?->photo ?? null" />
                </div>
            </div>
        </div>
    </div>
    {{-- footer Section 3 --}}
    <div class="accordion-item">
        <input type="hidden" name="sections['footer']" value="footer">
        <h2 class="accordion-header" style="position: relative">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFooter" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFooter">
                Footer Section #3

            </button>

            <div class="form-check"
                style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);z-index: 10; ">
                <h6> <input class="form-check-input" type="checkbox" @checked(!in_array('footer',$sections?->pluck('identifier')->toArray()??['footer'])) value="" id="flexCheckCheckedfooter">
                    <label class="form-check-label" for="flexCheckCheckedfooter">
                        Hidden
                    </label>
                </h6>
            </div>


        </h2>
        <div id="panelsStayOpen-collapseFooter" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="col-md-6  mt-2">
                    <x-input-wedgits.description label="Footer Description" name="descriptions[footer][desc_footer]"
                        sheight="350" id="description_footer" :value="$descriptions->firstWhere('identifier', 'desc_footer')?->description ?? null" />
                </div>
                <div class="col-md-12 mt-2">
                    <div class="card">
                        <div class="card-header" style="justify-content: center">
                            <h5 class="card-title text-center">Choose Call To Action On This Section</h5>
                        </div>
                        <div class="card-body">
                            <x-input-wedgits.ctainputs id="footer_cta" name="cta[footer][]" :ctas="$ctas->firstWhere('identifier', 'footer') ?? null" />
                        </div>
                    </div>

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
