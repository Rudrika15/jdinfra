<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Topbar;
use App\Models\Project;
use App\Models\Slider;

use App\Models\Youtube_slider;
use App\Models\Backgroundimage;


class Slider1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        
        public function index()
        {
            {
            $topbars = Topbar::find(1);
            $sliders = Slider::all();
            $projects = Project::all();
            $youtube = Youtube_slider::all();
            $images = Backgroundimage::all();
            
            
           
            // return $sliders;
    
            return view('visitor.slider.slider',compact('topbars','projects','youtube','images','sliders'));
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
