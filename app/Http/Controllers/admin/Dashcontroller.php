<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Compound;

use App\Models\admin\Developer;
use App\Models\admin\Post;
use App\Models\admin\Property;



class Dashcontroller extends Controller
{
public function index()
{
   
   return view('dashbourd.index',[]);
}

}