<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Companydetail;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanydetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $companys = Companydetail::where('projectid', $id)->get();
        return view('admin.company.index', compact('companys'));
    }
    public function trashdata($id = 0)
    {
        $companys = Companydetail::where('projectid', $id)->onlyTrashed()->get();
        return view('admin.company.trash', compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $projects = Project::find($id);
        $companys = Companydetail::all();
        return view('admin.company.create', compact('companys', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'address' => 'required',
            // Other validation rules...
        ]);

        $input = $request->all();

        if ($logo = $request->file('logo')) {
            $destinationPath = 'company-logo/';
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $logoImage);
            $input['logo'] = "$logoImage";
        }

        $company = Companydetail::create($input);

        return redirect()->route('company.index', $company->projectid)
            ->with('success', 'Company data added successfully');
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
    public function edit(string $id)
    {
        $company = Companydetail::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Companydetail $companydetail)
    {
        $request->validate([
            'company_name',
            'logo' => 'mimes:jpeg,png,jpg,gif,svg',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'address'
            // Other validation rules...
        ]);

        $input = $request->all();
        // Move old logo to deleted folder and upload new logo
        if ($logo = $request->file('logo')) {
            $destinationPath = 'company-logo/';
            $oldLogoPath = 'company-logo/' . $companydetail->logo;
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $logoImage);

            // Check if the file exists before attempting to delete
            if (File::exists(public_path($oldLogoPath))) {
                File::delete(public_path($oldLogoPath)); // Delete old logo
            }

            $input['logo'] = "$logoImage"; // Updated logo path
        }
        $companydetail->update($input);

        return redirect()->route('company.index', $companydetail->projectid)
            ->with('success', 'Company data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $companydetail = Companydetail::find($id);

        // Delete the companydetail record
        $companydetail->delete();

        return redirect()->back()
            ->with('success', 'Company Details deleted successfully');
    }
    public function restore(Request $request)
    {
        $id = $request->id;
        $companydetail = Companydetail::withTrashed()->find($id);
        // Delete the companydetail record
        $companydetail->restore();

        return redirect()->back()
            ->with('success', 'Company Details restored successfully');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $companydetail = Companydetail::withTrashed()->find($id);

        // Delete the associated icon file
        $iconPath = 'company-logo/' . $companydetail->logo;
        if ($companydetail->logo && file_exists(public_path($iconPath))) {
            unlink(public_path($iconPath)); // Delete the icon file
        }

        // Delete the companydetail record
        $companydetail->forceDelete();

        return redirect()->back()
            ->with('success', 'Company Details permanently deleted successfully');
    }
}
