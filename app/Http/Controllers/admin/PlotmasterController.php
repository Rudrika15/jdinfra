<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\HistoryBooking;
use App\Models\Plotmaster;
use App\Models\Project;
use App\Models\Sectormaster;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class PlotmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id = 0)
    {
        $project = Project::find($id);

        $sectors = Sectormaster::where('projectid', $id)->get();
        $plots = Plotmaster::with("sector")
            ->whereHas('sector', function ($query) use ($id) {
                $query->where('projectid', $id);
            })
            ->get();

        return view('admin.plots.show', compact('plots', 'sectors', 'project'));
    }
    public function trashdata(Request $request, $id = 0)
    {
        $project = Project::find($id);


        $plots = Plotmaster::with("sector")
            ->whereHas('sector', function ($query) use ($id) {
                $query->where('projectid', $id);
            })
            ->onlyTrashed()
            ->get();


        return view('admin.plots.trash', compact('plots', 'project'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id = 0)
    {
        $sector = Sectormaster::find($id);

        return view('admin.plots.create', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sectorplot(Request $request, $id = 0)
    {
        $sector = Sectormaster::find($id);

        return view('admin.plots.sectorplot', compact('sector'));
    }


    public function sectorplotstore(Request $request)
    {
        $request->validate([
            'sectormasterid' => 'required|exists:sectormasters,id',
            'strt' => 'required|numeric',
            'end' => 'required|numeric|gte:strt',
            'area'  => 'required',
            'status'  => 'required',
        ]);

        $sectormasterid = $request->input('sectormasterid');
        $strt = $request->input('strt');
        $end = $request->input('end');

        for ($i = $strt; $i <= $end; $i++) {
            $validator = Validator::make(['plotnumber' => $i, 'sectormasterid' => $sectormasterid], [
                'plotnumber' => [
                    'required',
                    Rule::unique('plotmasters', 'plotnumber')->where('sectormasterid', $sectormasterid),
                ],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)

                    ->withInput();
            }
            $input = $request->all();
            $input['plotnumber'] = $i;
            $project =  Plotmaster::create($input);
        }

        return redirect()->route('sector.index', $project->sector->projectid)
            ->with('success', 'Sector ' . $project->sector->sectorname . ' in plot no ' . $strt . ' to ' . $end . '  added successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'sectormasterid' => 'required|exists:sectormasters,id',
            'strt' => 'required|numeric',
            'end' => 'required|numeric|gte:strt',
            'area'  => 'required',
            'status'  => 'required',
        ]);

        $sectormasterid = $request->input('sectormasterid');
        $strt = $request->input('strt');
        $end = $request->input('end');

        for ($i = $strt; $i <= $end; $i++) {
            $validator = Validator::make(['plotnumber' => $i, 'sectormasterid' => $sectormasterid], [
                'plotnumber' => [
                    'required',
                    Rule::unique('plotmasters', 'plotnumber')->where('sectormasterid', $sectormasterid),
                ],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)

                    ->withInput();
            }
            $input = $request->all();
            $input['plotnumber'] = $i;
            $project =  Plotmaster::create($input);
        }

        return redirect()->route('plot.index', $project->sector->projectid)
            ->with('success', 'Sector ' . $project->sector->sectorname . ' in plot no ' . $strt . ' to ' . $end . '  added successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $sectors = Sectormaster::all();
        $plotmaster = Plotmaster::find($id);
        return view('admin.plots.edit', compact('sectors', 'plotmaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plotmaster $plotmaster)
    {
        $request->validate([
            // 'sectormasterid' => 'required',
            // 'plotnumber'  => 'required',
            'area'  => 'required',
            'status'  => 'required',
        ]);

        $input = $request->all();

        $plotmaster->update($input);
        return redirect()->route('plot.index', $plotmaster->sector->projectid)
            ->with('success', 'Sector ' . $plotmaster->sector->sectorname . ' Plot no ' . $plotmaster->plotnumber . ' data updated successfully
            ');
    }

    public function delete(Request $request, $id)
    {
        // Retrieve the plot by ID
        $plot = Plotmaster::findOrFail($id);
        
        // Check if soft deletes are enabled
        if (Schema::hasColumn($plot->getTable(), 'deleted_at')) {
            // Soft delete the plot
            $plot->delete();
            return redirect()->back()->with('success', 'Plot deleted successfully');
        } else {
            // Update the status column to mark as deleted
            $plot->status = 'deleted';
            $plot->save();
            return redirect()->back()->with('success', 'Plot marked as deleted successfully');
        }
    }
    public function restore(Request $request, $id)
    {
        // Retrieve the plot by ID (including soft deleted plots)
        $plot = Plotmaster::withTrashed()->findOrFail($id);
        
        // Check if the plot is soft deleted
        if ($plot->trashed()) {
            // Restore the soft deleted plot
            $plot->restore();
            
            // Ensure the plot's sector relationship is correct after restoration
            $sector = $plot->sector; // Retrieve the associated sector
            
            return redirect()->back()->with('success', 'Plot restored successfully');
        } else {
            // Plot is not soft deleted, return with an error message
            return redirect()->back()->with('error', 'Plot is not restored');
        }
    }
    public function destroy(Request $request, $id)
    {
        // Retrieve the plot by ID
        $plot = Plotmaster::withTrashed()->findOrFail($id);
        
        // Check if soft deletes are enabled
        if (Schema::hasColumn($plot->getTable(), 'deleted_at')) {
            // Soft delete the plot
            $plot->forceDelete();
            return redirect()->back()->with('success', 'Plot permanently delete successfully');
        } else {
            // Update the status column to mark as deleted
            $plot->status = 'deleted';
            $plot->save();
            return redirect()->back()->with('success', 'Plot marked as deleted successfully');
        }
    }
    public function plotdetails($id)
    {
        $bookings = Booking::find($id);
        // $history = HistoryBooking::query()->whereHas($bookings);
        $history = HistoryBooking::where('booking_id', $id)->first();
        // $history = HistoryBooking::all();
        // return $history->plotid;
        // return $history;

        return \view('admin.plots.plotdetails', \compact('history'));   
    }

    public function resold($id)
    {
    
        // Find the booking record by ID
        $booking = Booking::findOrFail($id);
    
        // Move the booking to history_bookings table and delete from bookings table
        $booking->move(HistoryBooking::class);
        $pid = $booking->plotid;
        $plot = Plotmaster::find($pid);
    
    
        $plot->status = 'Resold';
        $plot->save();
        return redirect()->route('admin.booking.viewbooking', $booking->plot->sector->project->id)
            ->with('Success', 'Plot resold successfully');
    }

    public function resoldshow(Request $request, $id = 0)
    {
       
        $history= HistoryBooking::whereHas('plot', function ($query) {
            $query->where('status', 'Resold');
        })->get();
           

        return view('admin.plots.resold', compact('history'));
    }
}
