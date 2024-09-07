<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = slider::all();

        return view('admin.slider.index', compact('sliders'));
    }
    public function trashdata()
    {
        $sliders = slider::onlyTrashed()->get();

        return view('admin.slider.trash', compact('sliders'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('admin.slider.create', compact('projects'));
    }
    public function store(request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'navigation' => 'required',
            'imageurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'required'
        ]);
        // dd($request);
        $input = $request->all();

        if ($image = $request->file('imageurl')) {
            $destinationPath = 'slider-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = "$profileImage";
        }
        //return $input;
        Slider::create($input);
        return redirect()->route('topbar.index')
            ->with('Slidersuccess', 'Slider data added successfully
            ');
    }

    public function show(string $id)
    {
        // return view('admin.slider.show', compact('sliders'));
    }

    public function edit(Request $request, $id)
    {
        $projects = Project::all();
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders', 'projects'));
    }
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'navigation' => 'required',
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'order' => 'required'
        ]);

        $input = $request->all();

        // Check if a new image is uploaded
        if ($image = $request->file('imageurl')) {
            // Delete old image if it exists
            if ($slider->imageurl && file_exists(public_path('slider-images/' . $slider->imageurl))) {
                unlink(public_path('slider-images/' . $slider->imageurl));
            }

            // Upload and save the new image
            $destinationPath = 'slider-images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imageurl'] = $profileImage;
        } else {
            unset($input['imageurl']); // Remove image field from input if no new image is uploaded
        }

        $slider->update($input);

        return redirect()->route('topbar.index')
            ->with('Slidersuccess', 'Slider  updated successfully');
    }

    public function delete(string $id)
    { {
            // Find the aminitie record
            $sliders = Slider::find($id);

            // Delete the sliders record
            $sliders->delete();

            return redirect()->route('topbar.index')
                ->with('Slidersuccess', 'Slider  deleted successfully
            ');
        }
    }
    public function restore(string $id)
    { {
            // Find the aminitie record
            $sliders = Slider::withTrashed()->find($id);

            // Delete the sliders record
            $sliders->restore();

            return redirect()->route('slider.trash')
                ->with('Slidersuccess', 'Slider  restored successfully
            ');
        }
    }
    public function destroy(string $id)
    { {
            // Find the aminitie record
            $sliders = Slider::withTrashed()->find($id);

            // Delete the associated icon file
            $iconPath = 'slider-images/' . $sliders->imageurl;
            if ($sliders->imageurl && file_exists(public_path($iconPath))) {
                unlink(public_path($iconPath)); // Delete the icon file
            }

            // Delete the sliders record
            $sliders->forceDelete();

            return redirect()->route('slider.trash')
                ->with('Slidersuccess', 'Slider  permanently deleted successfully
            ');
        }
    }
}
