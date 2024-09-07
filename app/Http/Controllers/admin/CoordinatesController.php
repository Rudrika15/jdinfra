<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use App\Models\Project;
use App\Models\Projectgallery;
use Illuminate\Http\Request;

class CoordinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $coordinates = Coordinate::where('projectid', $id)->get();
        $layout = Projectgallery::where('projectid', $id)
            ->where('gallery_type', 'plot_plan')
            ->get();
        return \view('admin.coordinates.index', \compact('coordinates', 'layout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $project = Project::find($id);
        return view('admin.coordinates.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'sector_name' => 'required|regex:/^[0-9]+$/',
            'plot_id' => 'required|regex:/^[0-9]+$/',
            'x1' => 'required|regex:/^[0-9]+$/',
            'y1' => 'required|regex:/^[0-9]+$/',
            'x2' => 'required|regex:/^[0-9]+$/',
            'y2' => 'required|regex:/^[0-9]+$/',
            'x3' => 'required|regex:/^[0-9]+$/',
            'y3' => 'required|regex:/^[0-9]+$/',
            'x4' => 'required|regex:/^[0-9]+$/',
            'y4' => 'required|regex:/^[0-9]+$/',
            'x5' => '',
            'y5' => '',
        ]);
        $input = $request->all();

        Coordinate::create($input);
        $project = Project::find($id);
        return redirect()->route('layout.index', $project->id)->with('success', 'Coordinate data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $coordinates = Coordinate::all();

        // Pass coordinates to the view for rendering
        return view('admin.coordinates.show', compact('coordinates'));
    }
    public function showtrash($id = 0)
    {
        $coordinates = Coordinate::where('projectid', $id)->onlyTrashed()->get();

        // Pass coordinates to the view for rendering
        return view('admin.coordinates.trash', compact('coordinates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coordinate = Coordinate::find($id);
        return view('admin.coordinates.edit', compact('coordinate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sector_name' => 'required|regex:/^[0-9]+$/',
            'plot_id' => 'required|regex:/^[0-9]+$/',
            'x1' => 'required|regex:/^[0-9]+$/',
            'y1' => 'required|regex:/^[0-9]+$/',
            'x2' => 'required|regex:/^[0-9]+$/',
            'y2' => 'required|regex:/^[0-9]+$/',
            'x3' => 'required|regex:/^[0-9]+$/',
            'y3' => 'required|regex:/^[0-9]+$/',
            'x4' => 'required|regex:/^[0-9]+$/',
            'y4' => 'required|regex:/^[0-9]+$/',
            'x5' => '',
            'y5' => '',
        ]);

        $coordinate = Coordinate::find($id);
        $coordinate->update($request->all());

        return redirect()->route('layout.index', $coordinate->projectid)->with('success', 'Coordinate data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $coordinate =  Coordinate::find($id);

        $coordinate->delete();
        return redirect()->back()->with('success', 'Coordinate deleted successfully');
    }
    public function restore(string $id)
    {
        $coordinate =  Coordinate::withTrashed()->find($id);

        $coordinate->restore();
        return redirect()->back()->with('success', 'Coordinate restored successfully');
    }
    public function destroy(string $id)
    {
        $coordinate =  Coordinate::withTrashed()->find($id);

        $coordinate->forceDelete();
        return redirect()->back()->with('success', 'Coordinate permanently deleted successfully');
    }
}
