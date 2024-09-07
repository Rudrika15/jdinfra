<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Flipbook;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flipbooks = Flipbook::all();
        return view('admin.flipbook.create', compact('flipbooks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imageurl' => 'required|file|mimes:pdf|max:10000',
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
            'imageurl' => 'file|mimes:pdf|max:10000',
        ]);

        $input = $request->all();

        // Check if a new PDF file is uploaded
        if ($image = $request->file('imageurl')) {
            // Delete old PDF file if it exists
            $oldPdfFilePath = public_path('flipbook-pdf/') . $flipbook->imageurl;
            if (file_exists($oldPdfFilePath)) {
                unlink($oldPdfFilePath);
            }

            // Upload and save the new PDF file
            $destinationPath = 'flipbook-pdf/';
            $newPdfFileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $newPdfFileName);
            $input['imageurl'] = $newPdfFileName;
        } else {
            unset($input['imageurl']); // Remove imageurl field from input if no new PDF file is uploaded
        }

        $flipbook->update($input);

        return redirect()->route('flipbook.index', $flipbook->projectid)
            ->with('success', 'Flipbook data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flipbook = Flipbook::find($id);

        // Delete associated PDF file
        $pdfFilePath = public_path('flipbook-pdf/') . $flipbook->imageurl;
        if (file_exists($pdfFilePath)) {
            unlink($pdfFilePath);
        }

        // Delete Flipbook from the database
        $flipbook->delete();

        return redirect()->back()
            ->with('success', 'Flipbook deleted successfully');
    }
}
