<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\themes\LPages;

class Theme1FrontController extends Controller
{
    public function show($slug)
    {
        $page = LPages::where('slug', $slug)->firstOrFail();
        $theme = $page->theme->title;

        return view("dashbourd.themes." . $theme . ".template");
    }

}