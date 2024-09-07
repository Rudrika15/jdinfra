<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Topbar;
use App\Models\Slider;
use App\Models\Projectgallery;
use App\Models\Aminitie;
use App\Models\Flipbook;
use App\Models\Backgroundimage;


class ProjectController extends Controller
{
    //
    public function project(){
        $projects = Project::all();
        $progallerys = Projectgallery::all();
        $topbars = Topbar::find(1);
        $images = Backgroundimage::all();
        return view('visitor.project.projects',compact('projects','topbars','progallerys','images'));
    }

    public function projectdetails(Request $request,$id){
        $topbars = Topbar::find(1);
        $aminities = Aminitie::where('projectid', $id)->get();
        $project = Project::find($id);
        
        $progallerys = Projectgallery::where('projectid' , $id)
        ->where('gallery_type' ,'plot_plan',$id)                    
        ->get();
        $progallery = Projectgallery::where('projectid' , $id)
        ->where('gallery_type' ,'location',$id)                    
        ->get();
        $gallery = Projectgallery::where('projectid' , $id)
        ->where('gallery_type' ,'gallery',$id)                    
        ->get();
        $price = Projectgallery::where('projectid' , $id)
        ->where('gallery_type' ,'price_list',$id)                    
        ->get();
        $layout = Projectgallery::where('projectid' , $id)
        ->where('gallery_type' ,'download',$id)                    
        ->get();
        $sliders = Slider::where('navigation',$id)->get();
        // return $sliders;
        
        $flipbooks = Flipbook::where('projectid', $id)->get();
      
        return view('visitor.project.projectdetails',compact('topbars','progallery','project','progallerys','sliders','gallery','aminities','flipbooks','price','layout'));
    }
    // public function layout(Request $request,$id){

    //     $progallerys = Projectgallery::find($id);
    //     return \view('visitor.project.layout', compact('progallerys'));
    // }

   
}
