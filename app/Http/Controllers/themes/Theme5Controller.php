<?php

namespace App\Http\Controllers\themes;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\themes\LPages;
use App\Models\themes\BackGround;
use App\Models\themes\Calltoaction;
use App\Models\themes\Description;
use App\Models\themes\Gallary;
use App\Models\themes\Logos;
use App\Models\themes\PageFeature;
use App\Models\themes\Photo;
use App\Models\themes\Section;
use App\Models\themes\Theme as PageTheme;
use App\Models\themes\Unit;
use App\Traits\Myfun;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Theme5Controller extends Controller
{

    use Myfun;
    // get all pages 
    public function index()
    {
        return view('dashbourd.themes.theme5.index');
    }

    // create page
    public function create()
    {
        $page = new LPages();
        $logos = collect([]);
        $backgrounds = collect([]);
        $descriptions = collect([]);
        $units = collect([]);
        $features = collect([]);
        $ctas = collect([]);
        $gallary = collect([]);
        $photos = collect([]);
        
        return view('dashbourd.themes.theme5.create', [
            'page' => $page,
            'descriptions' => $descriptions,
            'backgrounds' => $backgrounds,
            'logos' => $logos,
            'units' => $units,
            'features' => $features,
            'gallary' => $gallary,
            'ctas' => $ctas,
            'photos'=>$photos,
            'sections' => null,
        ]);
    }

    // store page 
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $themeTitle = "theme5"; // Assuming you have a way to determine the theme
            $theme = PageTheme::where('title', $themeTitle)->first();
            $user=Auth::guard('admin')->user();
            // Create page
            $page = new LPages();
            $page->admin_id = $user->id;
            $page->agent_id = $user?->agent_id;
            $page->theme_id = $theme->id;
            $page->title = $request->input('page_title');
            $page->slug = Str::slug($request->input('page_title'));
            $page->whats = $request->input('whats');
            $page->mobile = $request->input('mobile');
            $page->email = $request->input('email');
            $page->massenger = $request->input('massenger');
            $page->google_script = $request->input('google_script');
            $page->google_noscript = $request->input('google_noscript');
            $page->save();

            // create sections to the page
            if ($request->input('sections')) {
                foreach ($request->input('sections') as $sectionTitle) {
                    $section = new Section();
                    $section->l_page_id = $page->id;
                    $section->identifier = $sectionTitle;
                    $section->save();
                }
            }
            // Assuming you have multiple logos to store, you can loop through the inputs
            if ($request->file('logos')) {
                foreach ($request->file('logos') as $sectionTitle => $logoFiles) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    // dd($section);
                    if (is_array($logoFiles)) {
                        foreach ($logoFiles as $identifier => $logo) {
                            $logoPath = $this->uploadeImg($logo, 'theme5/logos',250,250); // Store the logo image

                            // Create a new logo entry for the specific section and page
                            $logo = new Logos();
                            $logo->section_id = $section->id;
                            $logo->identifier = $identifier;
                            $logo->logo = $logoPath;
                            $logo->save();
                        }
                    }
                }
            }
            // gallary
            if ($request->file('gallary')) {

                foreach ($request->file('gallary') as $sectionTitle => $gallaryFiles) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    if (is_array($gallaryFiles)) {
                        $data['section_id'] = $section->id;
                        $data['identifier'] = $sectionTitle;
                        $data['gallary'] = json_encode($this->uplaodeGallary($gallaryFiles, 'theme5/gallary'));
                        Gallary::create($data);
                    }
                }
            }
            if ($request->input('cta') && $this->multiDimensionArrayNotEmpty($request->input('cta'))) {
                // dd($request->input('cta'));
                foreach ($request->input('cta') as $sectionTitle => $cta) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    if ($this->multiDimensionArrayNotEmpty($cta)) {
                        $data['section_id'] = $section->id;
                        $data['identifier'] = $sectionTitle;
                        $data['cta'] = json_encode($cta);
                        Calltoaction::create($data);
                    }
                }
            }
            // backgrounds
            if ($request->file('backgrounds')) {
                foreach ($request->file('backgrounds') as $sectionTitle => $bgFiles) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    if (is_array($bgFiles)) {
                        foreach ($bgFiles as $identifier => $image) {
                            $imagePath = $this->uploadeImg($image, 'theme5/backgrounds',1920,1080); // Store the logo image

                            // Create a new logo entry for the specific section and page
                            $bg = new BackGround();
                            $bg->section_id = $section->id;
                            $bg->identifier = $identifier;
                            $bg->image_url = $imagePath;
                            $bg->save();
                        }
                    }
                }
            }
            if ($request->file('photos')) {
                foreach ($request->file('photos') as $sectionTitle => $phFiles) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    if (is_array($phFiles)) {
                        foreach ($phFiles as $identifier => $image) {
                            $imagePath = $this->uploadeImg($image, 'theme5/photos',1000,750); // Store the logo image

                            // Create a new logo entry for the specific section and page
                            $bg = new Photo();
                            $bg->section_id = $section->id;
                            $bg->identifier = $identifier;
                            $bg->photo = $imagePath;
                            $bg->save();
                        }
                    }
                }
            }

            // Assuming you have multiple descriptions to store, you can loop through the inputs
            if ($request->input('descriptions') && is_array($request->input('descriptions')) && $this->multiDimensionArrayNotEmpty($request->input('descriptions'))) {
                foreach ($request->input('descriptions') as $sectionTitle => $mydescriptions) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    // Create a new logo entry for the specific theme and page
                    if ($this->multiDimensionArrayNotEmpty($mydescriptions)) {
                        foreach ($mydescriptions as $identifier => $description) {

                            $desc = new Description();
                            $desc->section_id = $section->id;
                            $desc->identifier = $identifier;
                            $desc->description = $description;
                            $desc->save();
                        }
                    }
                }
            }

            // add units
            if ($request->input('unitData') && $this->multiDimensionArrayNotEmpty($request->input('unitData'))) {
                foreach ($request->input('unitData') as $sectionTitle => $data) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    // Create a new logo entry for the specific theme and page
                    $i = 1;
                    $data = json_decode($data, true);
                    if (is_array($data)) {
                        foreach ($data as $unit) {
                            // $photoPath = $this->uploadeCard_Photo($unit['url_logo'], 'theme5/units/photos'); // Store the logo image
                            $unitop = new Unit();
                            $unitop->section_id = $section->id;
                            $unitop->identifier = 'unit_' . $i;
                            $unitop->img_url = $unit['img_url'];
                            $unitop->description = $unit['description'];
                            $unitop->type = $unit['type'];
                            $unitop->save();

                            $i++;
                        }
                    }
                }
            }

            //feature data
            if ($request->input('featurData') && $this->multiDimensionArrayNotEmpty($request->input('featurData'))) {
                foreach ($request->input('featurData') as $sectionTitle => $data) {
                    $section = Section::where('l_page_id', $page->id)->where('identifier', $sectionTitle)->first();
                    // Create a new logo entry for the specific theme and page
                    $i = 1;
                    $data = json_decode($data, true);
                    if (is_array($data)) {
                        foreach ($data as $feature) {
                            // $photoPath = $this->uploadeImg_Logo($feature['url_icon'], 'theme5/features'); // Store the logo image
                            $featureop = new PageFeature();
                            $featureop->section_id = $section->id;
                            $unitop->identifier = 'feature_' . $i;
                            $featureop->icon_url = $feature['icon_url'];
                            $featureop->description = $feature['description'];
                            $featureop->save();
                            $i++;
                        }
                    }
                }
            }
            DB::commit();

            return response()->json([
                'lpagesindexUrl' => route('dashbourd.landing_pages.index')
            ]);
        } catch (QueryException $e) {
            // Handle database query exceptions
            DB::rollBack();
            return response()->json([
                'error' => 'Database error: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        } catch (ValidationException $e) {
            // Handle validation errors
            DB::rollBack();
            return response()->json([
                'error' => 'Validation error: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            // Handle other general exceptions
            DB::rollBack();
            return response()->json([
                'error' => 'An error occurred: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        }
    }

    // show page
    public function show(PageTheme $Theme)
    {
        return view('dashbourd.themes.theme5.s_template');
    }

    // edit bage 
    public function edit($id)
    {
        $page = LPages::find($id);
        $sections = Section::where('l_page_id', $id)->get();
        $sectionIds = $sections->pluck('id');
        $descriptions = Description::whereIn('section_id', $sectionIds)->get();
        $logos = Logos::whereIn('section_id', $sectionIds)->get();
        $backgrounds = BackGround::whereIn('section_id', $sectionIds)->get();
        $units = Unit::whereIn('section_id', $sectionIds)->get();
        $features = PageFeature::whereIn('section_id', $sectionIds)->get();
        $gallary = Gallary::whereIn('section_id', $sectionIds)->get();
        $ctas = Calltoaction::whereIn('section_id', $sectionIds)->get();
        $photos = Photo::whereIn('section_id', $sectionIds)->get();
        
        return view('dashbourd.themes.theme5.edit', [
            'pageId' => $id,
            'page' => $page,
            'sections' => $sections,
            'descriptions' => $descriptions,
            'logos' => $logos,
            'backgrounds' => $backgrounds,
            'units' => $units,
            'features' => $features,
            'gallary' => $gallary,
            'ctas' => $ctas,
            'photos' => $photos,
        ]);
    }

    // update page 
    public function update(Request $request, $id)
    {


        DB::beginTransaction();
        try {

            //update sitting page
            $page = LPages::find($id);
            $page->title = $request->input('page_title');
            $page->slug = Str::slug($request->input('page_title'));
            $page->whats = $request->input('whats');
            $page->mobile = $request->input('mobile');
            $page->email = $request->input('email');
            $page->massenger = $request->input('massenger');
            $page->google_script = $request->input('google_script');
            $page->google_noscript = $request->input('google_noscript');
            $page->save();
            //update sections
            if ($request->input('sections')) {
                $existingSections = Section::where('l_page_id', $id)->get();

                foreach ($existingSections as $existingSection) {
                    $identifier = $existingSection->identifier;
                    // Check if the identifier exists in the new array of sections
                    if (!in_array($identifier, $request->input('sections'))) {
                        // If not, delete the section
                        // dd($existingSection);
                        $existingSection->delete();
                    }
                }
            
                foreach ($request->input('sections') as $sectionTitle) {
                   
                    Section::query()->updateOrCreateSection($id, $sectionTitle);
                }
            }
            // update page logoes
            if ($request->file('logos')) {
                foreach ($request->file('logos') as $sectionTitle => $logoFiles) {
                    $section = Section::where('l_page_id', $id)->where('identifier',$sectionTitle)->first();
                    if (is_array($logoFiles)) {
                        foreach ($logoFiles as $identifier => $logo) {
                            Logos::query()->updateOrCreateLogos($section->id, $identifier, $logo,250,250);
                        }
                    }
                }
            }
            // update page gallaries
            if ($request->file('gallary')) {

                foreach ($request->file('gallary') as $sectionTitle => $gallaryFiles) {
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    if (is_array($gallaryFiles)) {
                        Gallary::query()->updateOrCreateGallary($section->id, $sectionTitle, $gallaryFiles);
                    }
                }
            }
            // update page ctas
            if ($request->input('cta') && $this->multiDimensionArrayNotEmpty($request->input('cta'))) {
                foreach ($request->input('cta') as $sectionTitle => $cta) {
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    if ($this->multiDimensionArrayNotEmpty($cta)) {
                        Calltoaction::query()->updateOrCreateCta($section->id, $sectionTitle, $cta);
                    }
                }
            }
            // update page backgrounds
            if ($request->file('backgrounds')) {
                foreach ($request->file('backgrounds') as $sectionTitle => $bgFiles) {
                    //current section 
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    if (is_array($bgFiles)) {
                        foreach ($bgFiles as $identifier => $image) {
                            BackGround::query()->updateOrCreateBackgrounds($section->id, $identifier, $image,1920,1080);
                        }
                    }
                }
            }
            if ($request->file('photos')) {
                foreach ($request->file('photos') as $sectionTitle => $phFiles) {
                    //current section 
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    if (is_array($phFiles)) {
                        foreach ($phFiles as $identifier => $image) {
                            Photo::query()->updateOrCreatePhotos($section->id, $identifier, $image,1000,750);
                        }
                    }
                }
            }
            // update page descriptions
            if ($request->input('descriptions') && $this->multiDimensionArrayNotEmpty($request->input('descriptions'))) {
                foreach ($request->input('descriptions') as $sectionTitle => $mydescriptions) {
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    // Create a new logo entry for the specific theme and page
                    if ($this->multiDimensionArrayNotEmpty($mydescriptions)) {
                        //all desc in one section
                        foreach ($mydescriptions as $identifier => $description) {
                            Description::query()->updateOrCreateDes($section->id, $identifier, $description);
                        }
                    }
                }
            }
            // update page unitData
            if ($request->input('unitData') && $this->multiDimensionArrayNotEmpty($request->input('unitData'))) {
                foreach ($request->input('unitData') as $sectionTitle => $data) {
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    $data = json_decode($data, true);
                    // delete if not exist
                    $allpreunits_unitsection = Unit::where('section_id', $section->id)->get();
                    foreach ($allpreunits_unitsection as $prevunit) {
                        if (!in_array($prevunit->id, collect($data)->pluck('id')->toArray())) {
                            $prevunit->delete();
                        }
                    }
                    //upadtae and create if new
                    if (is_array($data)) {
                        foreach ($data as $unit) {
                            Unit::query()->updateOrCreateUnit($section->id, $unit);
                        }
                    }
                }
            }
            // update page featurData
            if ($request->input('featurData') && $this->multiDimensionArrayNotEmpty($request->input('featurData'))) {
                foreach ($request->input('featurData') as $sectionTitle => $data) {
                    $section = Section::where('l_page_id', $id)->where('identifier', $sectionTitle)->first();
                    $data = json_decode($data, true);
                    if (is_array($data)) {
                        $allprefeatures = PageFeature::where('section_id', $section->id)->get();
                        foreach ($allprefeatures as $prevFeature) {
                            if (!in_array($prevFeature->id, collect($data)->pluck('id')->toArray())) {
                                $prevFeature->delete();
                            }
                        }
                        foreach ($data as $feature) {
                            PageFeature::query()->updateOrCreateFeature($section->id, $feature);
                        }
                    }
                }
            }
            DB::commit();
            return response()->json([
                'lpagesindexUrl' => route('dashbourd.landing_pages.index')
            ]);
        } catch (QueryException $e) {
            // Handle database query exceptions
            DB::rollBack();
            return response()->json([
                'error' => 'Database error: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        } catch (ValidationException $e) {
            // Handle validation errors
            DB::rollBack();
            return response()->json([
                'error' => 'Validation error: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            // Handle other general exceptions
            DB::rollBack();
            return response()->json([
                'error' => 'An error occurred: (Line ' . $e->getLine() . '): '  . $e->getMessage(),
            ]);
        }
    }

    //delete the page 
    public function destroy(PageTheme $Theme)
    {
        //
    }

    
    // test if array have values (m.d.a)
    public function multiDimensionArrayNotEmpty($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if ($this->multiDimensionArrayNotEmpty($value)) {
                    return true;
                }
            } else {
                if (!empty($value)) {
                    return true;
                }
            }
        }
        return false;
    }
    // uploade Unit Photo
    public function uploadeUnitPhoto(Request $request)
    {
        $url_Path = '';
        if ($request->file('unit_photo')) {
            $url_Path = $this->uploadeImg($request->file('unit_photo'), 'theme5/units',520,400);
        }
        return response()->json([
            'url_Path' => asset($url_Path),
        ]);
    }
    // uploade feature  icon
    public function uploadeFeatureIcon(Request $request)
    {
        $url_Path = '';
        if ($request->file('feature_icons')) {
            $url_Path = $this->uploadeImg($request->file('feature_icons'), 'theme5/features',250,250);
        }
        return response()->json([
            'url_Path' => asset($url_Path),
        ]);
    }
}
