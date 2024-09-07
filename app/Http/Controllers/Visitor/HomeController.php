<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topbar;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Youtube_slider;
use App\Models\Backgroundimage;

class HomeController extends Controller
{
    //
    public function index(){
        $topbars = Topbar::find(1);
        $sliders = Slider::all();
        $projects = Project::all();
        $youtube = Youtube_slider::all();
        $images = Backgroundimage::all();
        
        
       
        // return $sliders;

        return view('visitor.home.index',compact('topbars','sliders','projects','youtube','images'));
    }
}
