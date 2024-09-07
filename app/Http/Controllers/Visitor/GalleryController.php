<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topbar;
use App\Models\Projectgallery;
use App\Models\Project;
use App\Models\Backgroundimage;

class GalleryController extends Controller
{
    //
    public function gallery()
    {
        // $projects = ProjectGallery::join('projects', 'projectgalleries.projectid', '=', 'projects.id')
        //     ->select('projects.title', 'projectgalleries.imageurl')
        //     ->where('projectgalleries.gallery_type', 'gallery')
        //     ->get();
        $projects = Project::with(['galleries' => function ($query) {
            // Filter galleries by specific 'gallery_type'
            $query->where('gallery_type', 'gallery');
        }])->get();

        // return $projects;

        $topbars = Topbar::find(1);
        $images = Backgroundimage::all();
        // $gallery = Projectgallery::all() ->where('gallery_type' ,'gallery'); 
        return view('visitor.gallery.gallery', compact('topbars', 'projects','images'));
    }
}
