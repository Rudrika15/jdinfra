<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Youtube_slider;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class Youtube_sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youtube = Youtube_slider::all();
        return view('admin.youtube.index', compact('youtube'));
    }
    public function trashdata()
    {
        $youtube = Youtube_slider::onlyTrashed()->get();
        return view('admin.youtube.trash', compact('youtube'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'youtubeurl' => 'required|url|unique:youtube_sliders,youtubeurl',
        ]);
        
        $input = $request->all();
        youtube_slider::create($input);

        return redirect()->route('topbar.index')->with('youtubeurlsuccess', 'Youtube slider url added successfully!');
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
    public function edit(Request $request, $id)
    {
        $youtube = Youtube_slider::find($id);
        return view('admin.youtube.edit', compact('youtube')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Youtube_slider $Youtube)
    {
        $request->validate([
            'youtubeurl' => 'url|unique:youtube_sliders,youtubeurl,'.$Youtube->id,
        ]);
        
        $input = $request->all();

        $Youtube->update($input);

        return redirect()->route('topbar.index')->with('youtubeurlsuccess', 'Youtube slider url updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
         Youtube_slider::find($id)->delete();

        return redirect()->back()->with('youtubeurlsuccess', 'Youtube slider url deleted successfully!');
    }
    public function restore(string $id)
    {
         Youtube_slider::withTrashed()->find($id)->restore();

        return redirect()->back()->with('youtubeurlsuccess', 'Youtube slider url restored successfully!');
    }
    public function destroy(string $id)
    {
         Youtube_slider::withTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('youtubeurlsuccess', 'Youtube slider url permanently deleted successfully!');
    }
}
