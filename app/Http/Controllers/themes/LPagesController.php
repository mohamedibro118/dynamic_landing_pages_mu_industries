<?php

namespace App\Http\Controllers\themes;

use App\Http\Controllers\Controller;
use App\Models\themes\BackGround;
use App\Models\themes\Calltoaction;
use App\Models\themes\Color;
use App\Models\themes\Description;
use App\Models\themes\Gallary;
use App\Models\themes\Logos;
use App\Models\themes\LPages;
use App\Models\themes\PageFeature;
use App\Models\themes\Photo;
use App\Models\themes\Section;
use App\Models\themes\Unit;
use Illuminate\Http\Request;

class LPagesController extends Controller
{
    public function index()
    {
        $lpages = LPages::all();
        return view('dashbourd.landing_pages.index', [
            'lpages' => $lpages,
        ]);
    }

    public function show($slug)
    {
        $page = LPages::where('slug', $slug)->firstOrFail();
        $theme = $page->theme->title;
        $sections = Section::where('l_page_id', $page->id)->get();
        $section_names=$sections->pluck('identifier')->toArray();
        $sectionIds = $sections->pluck('id');
        $descriptions = Description::whereIn('section_id', $sectionIds)->get();
        $logos = Logos::whereIn('section_id', $sectionIds)->get();
        $backgrounds = BackGround::whereIn('section_id', $sectionIds)->get();
        $units = Unit::whereIn('section_id', $sectionIds)->get();
        $features = PageFeature::whereIn('section_id', $sectionIds)->get();
        $gallary = Gallary::whereIn('section_id', $sectionIds)->get();
        $ctas = Calltoaction::whereIn('section_id', $sectionIds)->get();
        $photos = Photo::whereIn('section_id', $sectionIds)->get();
        $colors = Color::whereIn('section_id', $sectionIds)->get();

        return view("dashbourd.themes." . $theme . ".template",[
            'page' => $page,
            'section_names' => $section_names,
            'descriptions' => $descriptions,
            'logos' => $logos,
            'backgrounds' => $backgrounds,
            'units' => $units,
            'features' => $features,
            'gallary' => $gallary,
            'ctas' => $ctas,
            'photos'=> $photos,
            'colors'=> $colors,
        ]);
    }
    public function edit()
    {
        $lpages = LPages::all();
        return view('dashbourd.landing_pages.index', [
            'lpages' => $lpages,
        ]);
    }
    public function destroy($id)
    {
        $page = LPages::find($id);
        $page->destroy($id);
        return redirect()->back()->with('success', 'success operation');
    }
}
