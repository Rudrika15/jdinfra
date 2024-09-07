<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Flipbook;
use App\Models\Project;
use Illuminate\Http\Request;

class FlipbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $flipbooks = Flipbook::where('projectid', $id)->get();
        return view('admin.flipbook.index', compact('flipbooks'));
    }
    public function trashdata($id = 0)
    {
        $flipbooks = Flipbook::where('projectid', $id)->onlyTrashed()->get();
        return view('admin.flipbook.trash', compact('flipbooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $projects = Project::find($id);
        $flipbooks = Flipbook::all();
        return view('admin.flipbook.create', compact('flipbooks', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imageurl' => 'required|mimes:pdf',
        ]);

        $input = $request->all();


        if ($image = $request->file('imageurl')) {
            $destinationPath = 'flipbook-pdf/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = "$profileImage";
        }
        $flipbook =  Flipbook::create($input);
        return redirect()->route('flipbook.index', $flipbook->projectid)
            ->with('success', 'flipbooks data added successfully
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
        $flipbook = Flipbook::find($id);
        return view('admin.flipbook.edit', compact('flipbook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flipbook $flipbook)
    {
        $request->validate([
            'imageurl' => 'mimes:pdf',
        ]);

        $input = $request->all();
        // Move old image to deleted folder
        if ($image = $request->file('imageurl')) {
            $destinationPath = 'flipbook-pdf/';
            $oldImagePath = 'flipbook-pdf/' . $flipbook->imageurl;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            // Check if the file exists before attempting to unlink
            if (file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath)); // Delete old image
            }

            $input['imageurl'] = $profileImage;
        }




        $flipbook->update($input);

        return redirect()->route('flipbook.index', $flipbook->projectid)
            ->with('success', 'flipbook  data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $flipbook = Flipbook::find($id);

        // Delete Flipbook from the database
        $flipbook->delete();

        return redirect()->back()
            ->with('success', 'Flipbook deleted successfully');
    }
    public function restore(string $id)
    {
        $flipbook = Flipbook::withTrashed()->find($id);
        // Delete Flipbook from the database
        $flipbook->restore();

        return redirect()->back()
            ->with('success', 'Flipbook restored successfully');
    }
    public function destroy(string $id)
    {
        $flipbook = Flipbook::withTrashed()->find($id);

        // Delete associated PDF file
        $pdfFilePath = public_path('flipbook-pdf/') . $flipbook->imageurl;
        if (file_exists($pdfFilePath)) {
            unlink($pdfFilePath);
        }

        // Delete Flipbook from the database
        $flipbook->forceDelete();

        return redirect()->back()
            ->with('success', 'Flipbook  permanently deleted successfully');
    }
}
