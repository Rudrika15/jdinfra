<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Installment;
use App\Models\Project;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        $user = User::where('usertype', 'Agent')
            ->whereNull('status')
            ->get();
        return view('admin.report.index', compact('project', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function filterData(Request $request)
    {

        $query = Installment::query();
        $status = $request->input('status');
        $project = $request->input('project');
        $agent = $request->input('agent');
        $strt_date = $request->input('strt_date');
        $end_date = $request->input('end_date');

        $criteria = [
            'project' => null,
            'agent' => null,
            'status' => $status,
            'strt_date' => $strt_date,
            'end_date' => $end_date
        ];




        // Check if a status filter is applied
        if ($status) {
            // Eager load the related plot relationship to filter based on status

            $query->where('status', $status)->with('agentcommission');
        }

        if ($strt_date && $end_date) {

            $query->whereBetween('trans_date', [$strt_date, $end_date])->get();
        }



        //return $query->with("plot.sector")->get();

        if ($project) {
            $criteria['project'] = Project::where('id', $project)->value('title');
            $query->whereHas('booking.plot.sector', function ($query) use ($project) {
                $query->where('projectid', $project);
            });
        }

        if ($agent) {
            $criteria['agent'] = User::where('id', $agent)->value('name');
            $query->whereHas('booking', function ($query) use ($agent) {
                $query->where('agent', $agent);
            });
        }

        $installment = $query->get();


        // $criteria = compact('project', 'agent', 'status', 'strt_date', 'end_date');

        return view('admin.report.show', compact('installment', 'criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
