<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topbar;
use App\Models\Aboutusimage;
use App\Models\Backgroundimage;

class AboutController extends Controller
{
    public function about() {
        $topbars = Topbar::find(1);
        $images = Aboutusimage::all();
        $bgimages = Backgroundimage::all();
        return view('visitor.about.about',compact('topbars','images','bgimages'));
    
}
}
