<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Backgroundimage;
use Illuminate\Http\Request;

class BackgroundImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $images = Backgroundimage::all();
       return view('admin.backgroundimage.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Backgroundimage::all();
        return view('admin.backgroundimage.create', compact('images'));
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
            $destinationPath = 'background-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = "$profileImage";
        }
         Backgroundimage::create($input);
        return redirect()->route('topbar.index')
            ->with('Backgroundimagesuccess', 'backgroundimage data added successfully
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
        $images = Backgroundimage::find($id);
        return view('admin.backgroundimage.edit', compact('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Backgroundimage $backgroundimage)
    {
        $request->validate([
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $input = $request->all();
    
       
         // Move old image to deleted folder
         if ($image = $request->file('imageurl')) {
            $destinationPath = 'background-images/';
            $oldImagePath = 'background-images/' . $backgroundimage->imageurl;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            // Check if the file exists before attempting to unlink
            if (file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath)); // Delete old image
            }

            $input['imageurl'] = $profileImage;
        }
    
        $backgroundimage->update($input);
    
        return redirect()->route('topbar.index')
            ->with('Backgroundimagesuccess', 'Backgroundimage data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Backgroundimage::find($id)->delete();

        return redirect()->back()
            ->with('Backgroundimagesuccess', 'backgroundimage  deleted successfully
            ');
    }
}
