<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Projectgallery;
use App\Models\Sectormaster;
use Illuminate\Http\Request;

class ProjectgalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $progallerys = Projectgallery::where('projectid', $id)->get();
        return view('admin.projectgallery.index', compact('progallerys'));
    }
    public function trashdata($id = 0)
    {
        $progallerys = Projectgallery::where('projectid', $id)->onlyTrashed()->get();
        return view('admin.projectgallery.trash', compact('progallerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $projects = Project::find($id);
        $progallery = Projectgallery::find('projectid');
        return view('admin.projectgallery.create', compact('progallery', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id = 0)
    {
        // return $request->all();

        $request->validate([
            'title' => 'required',
            'gallery_type' => 'required',
            'imageurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $input = $request->all();
        // $input['projectid'] = session("newproject");


        if ($image = $request->file('imageurl')) {
            $destinationPath = 'gallery-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = "$profileImage";
        }

        $projectid = Project::find($id);
        Projectgallery::create($input);
        return redirect()->route('progallery.index', $projectid->id)
            ->with('success', 'Project gallery in data added successfully');
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
        $galleries = Projectgallery::find($id);
        return view('admin.projectgallery.edit', compact('galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projectgallery $projectgallery)
    {
        $request->validate([
            'title' => 'required',
            'gallery_type' => 'required',
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $input = $request->all();

        // Move old image to deleted folder
        if ($image = $request->file('imageurl')) {
            $destinationPath = 'gallery-images/';
            $oldImagePath = 'gallery-images/' . $projectgallery->imageurl;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            // Check if the file exists before attempting to unlink
            if (file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath)); // Delete old image
            }

            $input['imageurl'] = $profileImage;
        } else {
            unset($input['imageurl']);
        }

        $projectgallery->update($input);

        return redirect()->route('progallery.index', $projectgallery->projectid)
            ->with('success', 'Project gallery data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        // Find the project gallery record
        $projectGallery = Projectgallery::find($id);
        // Delete the project gallery record
        $projectGallery->delete();

        return redirect()->back()
            ->with('success', 'Gallery Image deleted successfully');
    }
    public function restore(Request $request)
    {
        $id = $request->id;

        // Find the project gallery record
        $projectGallery = Projectgallery::withTrashed()->find($id);

        // Delete the project gallery record
        $projectGallery->restore();

        return redirect()->back()
            ->with('success', 'Gallery Image restored successfully');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;

        // Find the project gallery record
        $projectGallery = Projectgallery::withTrashed()->find($id);

        // Delete the associated image file
        $imagePath = 'gallery-images/' . $projectGallery->imageurl;
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath)); // Delete the image file
        }

        // Delete the project gallery record
        $projectGallery->forceDelete();

        return redirect()->back()
            ->with('success', 'Gallery Image permanently delete successfully');
    }
}
