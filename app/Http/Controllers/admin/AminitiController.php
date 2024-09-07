<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aminitie;
use App\Models\Project;
use Illuminate\Http\Request;

class AminitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $aminities = Aminitie::where('projectid', $id)->get();
        return view('admin.aminiti.index', compact('aminities'));
    }
    public function trashdata($id = 0)
    {
        $aminities = Aminitie::where('projectid', $id)->onlyTrashed()->get();
        return view('admin.aminiti.trash', compact('aminities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $projects = Project::find($id);
        $aminities = Aminitie::all();
        return view('admin.aminiti.create', compact('aminities','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required|image|mimes:png',
        ]);

        $input = $request->all();

        if ($image = $request->file('icon')) {
            $destinationPath = 'aminitie-icon/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['icon'] = "$profileImage";
        }
        $aminitie =  Aminitie::create($input);
        return redirect()->route('aminiti.index', $aminitie->projectid)
            ->with('success', 'Aminitie data added successfully
       ');
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
        $aminitie = Aminitie::find($id);
        return view('admin.aminiti.edit', compact('aminitie'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aminitie $aminitie)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'image|mimes:png',
        ]);

        $input = $request->all();

        // Check if a new icon is uploaded
        if ($image = $request->file('icon')) {
            // Delete old icon if it exists
            if ($aminitie->icon && file_exists(public_path('aminitie-icon/' . $aminitie->icon))) {
                unlink(public_path('aminitie-icon/' . $aminitie->icon));
            }

            // Upload and save the new icon
            $destinationPath = 'aminitie-icon/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['icon'] = $profileImage;
        } else {
            unset($input['icon']); // Remove icon field from input if no new icon is uploaded
        }

        $aminitie->update($input);

        return redirect()->route('aminiti.index', $aminitie->projectid)
            ->with('success', 'Aminitie data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        // Find the aminitie record
        $aminitie = Aminitie::find($id);

        // Delete the aminitie record
        $aminitie->delete();

        return redirect()->back()
            ->with('success', 'Aminitie deleted successfully');
    }
    public function restore(string $id)
    {
        // Find the aminitie record
        $aminitie = Aminitie::withTrashed()->find($id);

     // Delete the aminitie record
        $aminitie->restore();

        return redirect()->back()
            ->with('success', 'Aminitie restored successfully');
    }
    public function destroy(string $id)
    {
        // Find the aminitie record
        $aminitie = Aminitie::withTrashed()->find($id);

        // Delete the associated icon file
        $iconPath = 'aminitie-icon/' . $aminitie->icon;
        if ($aminitie->icon && file_exists(public_path($iconPath))) {
            unlink(public_path($iconPath)); // Delete the icon file
        }

        // Delete the aminitie record
        $aminitie->forceDelete();

        return redirect()->back()
            ->with('success', 'Aminitie permanently deleted successfully');
    }
}
