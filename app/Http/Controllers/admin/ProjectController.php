<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Models\Project;
use App\Models\Projectgallery;
use App\Models\Sectormaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }
    public function trashdata()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.project.trash', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "hi";
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'brochure' => 'required|file|mimes:pdf',
            'map' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'imageurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'about' => 'required'

        ]);
        $input = $request->all();
        // return $input;

        if ($brochure = $request->file('brochure')) {
            $destinationPath = 'brochure-images/';
            $brochureImage = date('YmdHis') . "." . $brochure->getClientOriginalExtension();
            $brochure->move($destinationPath, $brochureImage);
            $input['brochure'] = "$brochureImage";
            // return "hi";
        }
        if ($logo = $request->file('logo')) {
            $destinationPath = 'project-logo/';
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $logoImage);
            $input['logo'] = "$logoImage";
        }

        if ($image = $request->file('imageurl')) {
            $destinationPath = 'project-images/';
            $projectImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $projectImage);
            $input['imageurl'] = "$projectImage";
        }
        //return $input;
        $project = Project::create($input);

        $editor = new Editor();
        $editor->projectid = $project->id;
        $editor->border_color = "#0b6ab2";
        $editor->body_color = "#f8f8f8";
        $editor->term_condition = "This is Default colors please customize it as your requirement";
        $editor->save();

        return redirect()->route('project.index')
            ->with('success', 'Project data added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
        $projects = Project::where('id', $id)->get();

        $sectors = Sectormaster::where('projectid', '=', $id)->get();
        $galleries = Projectgallery::where('projectid', '=', $id)->get();

        return view("admin.project.show", compact('projects', 'sectors', 'galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::find($id);
        $galleries = Projectgallery::all();
        return view('admin.project.edit', compact('projects', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'brochure' => 'file|mimes:pdf',
            'map' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();

        // Move old brochure to deleted folder
        if ($brochure = $request->file('brochure')) {
            $destinationPath = 'brochure-images/';
            $oldBrochurePath = 'brochure-images/' . $project->brochure;
            $brochureImage = date('YmdHis') . "." . $brochure->getClientOriginalExtension();
            $brochure->move($destinationPath, $brochureImage);

            // Check if the file exists before attempting to delete
            if (File::exists(public_path($oldBrochurePath))) {
                File::delete(public_path($oldBrochurePath)); // Delete old brochure
            }

            $input['brochure'] = "$brochureImage";
        }

        // Move old logo to deleted folder and upload new logo
        if ($logo = $request->file('logo')) {
            $destinationPath = 'project-logo/';
            $oldLogoPath = 'project-logo/' . $project->logo;
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $logoImage);

            // Check if the file exists before attempting to delete
            if (File::exists(public_path($oldLogoPath))) {
                File::delete(public_path($oldLogoPath)); // Delete old logo
            }

            $input['logo'] = "$logoImage"; // Updated logo path
        }

        // Move old image to deleted folder and upload new image
        if ($image = $request->file('imageurl')) {
            $destinationPath = 'project-images/';
            $oldImagePath = 'project-images/' . $project->imageurl;
            $projectImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $projectImage);

            // Check if the file exists before attempting to delete
            if (File::exists(public_path($oldImagePath))) {
                File::delete(public_path($oldImagePath)); // Delete old image
            }

            $input['imageurl'] = "$projectImage"; // Updated imageurl path
        }

        $project->update($input);

        return redirect()->route('project.index')->with('success', 'Project data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        // Find the project record
        $project = Project::find($id);

        // Delete the project record
        $project->delete();

        return redirect()->route('project.index')
            ->with('success', 'Project deleted successfully');
    }
    public function restore(Request $request, $id)
    {
        // Find the project record
        $project = Project::withTrashed()->find($id);

        // Delete the project record
        $project->restore();

        return redirect()->route('project.index')
            ->with('success', 'Project restore successfully');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;

        // Find the project record
        $project = Project::withTrashed()->find($id);

        // Delete the associated brochure file
        $brochurePath = 'brochure-images/' . $project->brochure;
        if (file_exists(public_path($brochurePath))) {
            unlink(public_path($brochurePath)); // Delete the brochure file
        }

        // Delete the associated image file
        $imagePath = 'project-images/' . $project->imageurl;
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath)); // Delete the image file
        }

        // Delete the project record
        $project->forceDelete();

        return redirect()->route('project.trash')
            ->with('success', 'Project permanently delete successfully');
    }
}
