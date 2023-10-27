<?php

namespace App\Http\Controllers\themes;
use App\Http\Controllers\Controller;
use App\Models\themes\Theme as PageTheme;
use Illuminate\Http\Request;

class IndexThemesController extends Controller
{
    
    public function index()
    {
        $themes = PageTheme::all();
        return view('dashbourd.themes.index',[
            'themes' => $themes,
        ]);
    }

    
  
}
