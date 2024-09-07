<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutusimage;
use Illuminate\Http\Request;

class AboutusImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Aboutusimage::all();
        return view('admin.aboutusimage.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Aboutusimage::all();
        return view('admin.aboutusimage.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imageurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();


        if ($image = $request->file('imageurl')) {
            $destinationPath = 'aboutus-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = "$profileImage";
        }
        Aboutusimage::create($input);
        return redirect()->route('topbar.index')
            ->with('Aboutusimagesuccess', 'aboutusimage data added successfully
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
        $images = Aboutusimage::find($id);
        return view('admin.aboutusimage.edit', compact('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aboutusimage $aboutusimage)
    {
        $request->validate([
            'imageurl' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();

        // Move old image to deleted folder
        if ($image = $request->file('imageurl')) {
            $destinationPath = 'aboutus-images/';
            $oldImagePath = 'aboutus-images/' . $aboutusimage->imageurl;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            // Check if the file exists before attempting to unlink
            if (file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath)); // Delete old image
            }

            $input['imageurl'] = $profileImage;
        }

        $aboutusimage->update($input);

        return redirect()->route('topbar.index')
            ->with('Aboutusimagesuccess', 'Aboutusimage data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Aboutusimage::find($id)->delete();

        return redirect()->back()
            ->with('Aboutusimagesuccess', 'backgroundimage  deleted successfully
            ');
    }
}
