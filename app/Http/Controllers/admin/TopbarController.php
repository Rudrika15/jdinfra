<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutusimage;
use App\Models\Backgroundimage;
use App\Models\Slider;
use App\Models\Topbar;
use App\Models\Youtube_slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $topbars = Topbar::all();
        $sliders = Slider::all();
        $youtube = Youtube_slider::all();
        $bgimages = Backgroundimage::all();
        $images = Aboutusimage::all();
        return  view('admin.topbar.index', compact('topbars', 'sliders', 'youtube', 'bgimages', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.topbar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $topbars = Topbar::find($id);
        return view('admin.topbar.edit', compact('topbars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topbar $topbar)
    {
        $request->validate([
            'title' => 'required',
            'contact1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'contact2' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'contact3' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' => 'required|email|unique:users',
            'social_logo1' => 'required',
            'social_logo2' => 'required',
            'social_logo3' => 'required',
        ]);
        $input = $request->all();

        // return $input;

        $topbar->update($input);
        return redirect()->route('topbar.index')
            ->with('Topbarsuccess', 'Topbar updated successfully
            ');
    }

    public function destroy(Request $request)
    {
    }
}
