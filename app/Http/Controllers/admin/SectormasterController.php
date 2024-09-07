<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plotmaster;
use App\Models\Project;
use App\Models\Sectormaster;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SectormasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id = 0)
    {

        $sectors = Sectormaster::where('projectid', $id)->get();
        return view('admin.sectormaster.index', compact('sectors'));
    }
    public function trashdata(Request $request, $id = 0)
    {

        $sectors = Sectormaster::where('projectid', $id)->onlyTrashed()->get();
        return view('admin.sectormaster.trashdata', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id = 0)
    {
        $projects = Project::find($id);
        $sectors = Sectormaster::where('projectid', $id)->get();
        return view('admin.sectormaster.create', compact('sectors','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'sectorname' => [
                'required',
                'integer',
                Rule::unique('sectormasters', 'sectorname')->where('projectid', $request->input('projectid'))
            ],
        ]);

        $input = $request->all();

        $sectormaster = Sectormaster::create($input);
        return redirect()->route('sector.index', $sectormaster->projectid)
            ->with('success', $sectormaster->project->title.' PROJECT in new sector data added successfully');
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
        $sectors = Sectormaster::find($id);
        return view('admin.sectormaster.edit', compact('sectors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sectormaster $sectormaster)
    {
        $request->validate([
            'sectorname' => [
                'required',
                'integer',
                Rule::unique('sectormasters', 'sectorname')
                    ->where('projectid', $request->input('projectid'))
                    ->ignore($sectormaster->id), 
            ],
        ]);

        $input = $request->all();

        $sectormaster->update($input);
        return redirect()->route('sector.index', $sectormaster->projectid)
            ->with('success', 'Sector data updated successfully');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Sectormaster::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Sector deleted successfully
            ');
    }
    public function restore($id)
    {
        Sectormaster::withTrashed()->find($id)->restore();

        return redirect()->back()
            ->with('success', 'Sector deleted successfully
            ');
    }
    public function destroy($id)
    {
        Sectormaster::withTrashed()->find($id)->forceDelete();

        return redirect()->back()
            ->with('success', 'Sector permanently delete successfully
            ');
    }
}
