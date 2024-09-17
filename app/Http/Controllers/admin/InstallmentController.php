<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agentcommission;
use App\Models\Booking;
use App\Models\Installment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\VersionUpdater\Installer;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request, $projectid)
    {
        // Check the logged-in user type
        $userType = Auth::user()->usertype;

        // Fetch all records initially
        $installments = Installment::query();

        $status = $request->input('status');
        // Check if a status filter is applied
        if ($status && $status !== 'All') {
            $installments->where('status', $status);
        } elseif ($status === 'All') {
            // No need to apply any status filter, fetch all records
        } else {
            // Default to 'Unpaid' if no status filter is applied
            $installments->where('status', 'Unpaid');
        }


        // Filter by the specified project ID
        $installments->whereHas('booking.plot.sector.project', function ($query) use ($projectid) {
            $query->where('id', $projectid);
        });

        // If the user is an agent, filter the records by agent ID
        if ($userType === 'Agent') {
            $agentId = Auth::user()->id;
            $installments->whereHas('user', function ($query) use ($agentId) {
                $query->where('id', $agentId);
            });
        }
        // $installments->onlyTrashed();   

        $installments = $installments->get();

        return view('admin.installment.index', compact('installments'));
    }
    public function trashdata(Request $request, $projectid)
    {
        // Check the logged-in user type
        $userType = Auth::user()->usertype;

        // Fetch all records initially
        $installments = Installment::query();

        $status = $request->input('status');
        // Check if a status filter is applied
        if ($status && $status !== 'All') {
            $installments->where('status', $status);
        } elseif ($status === 'All') {
            // No need to apply any status filter, fetch all records
        } else {
            // Default to 'Unpaid' if no status filter is applied
            $installments->where('status', 'Unpaid');
        }


        // Filter by the specified project ID
        $installments->whereHas('booking.plot.sector.project', function ($query) use ($projectid) {
            $query->where('id', $projectid);
        });

        // If the user is an agent, filter the records by agent ID
        if ($userType === 'Agent') {
            $agentId = Auth::user()->id;
            $installments->whereHas('user', function ($query) use ($agentId) {
                $query->where('id', $agentId);
            });
        }
        $installments->onlyTrashed();

        $installments = $installments->get();

        return view('admin.installment.trashdata', compact('installments'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $installments = Installment::find($id);
        return view('admin.installment.create', compact('installments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id',
            'user_id',
            'trans_date',
            'paid_amount',
            'remain_amount',
            'new_emi_amount',
            'installment_no',
            'status',
            'remarks',
        ]);

        $input = $request->all();

        Installment::create($input);
        return redirect()->route('installment.index')
            ->with('Success', 'Installment data added successfully
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
        $installments = Installment::find($id);
        return view('admin.installment.edit', compact('installments'));
    }
    public function viewmore(Request $request, $id)
    {
        $bookings = Booking::find($id);
        //return  $installment = Installment::where('booking_id', $id)->where('status', "!=", 'Completed')->get();
        return view('admin.installment.viewmore', \compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $installment = Installment::find($id);
        $total_paid_amt = $installment->total_paid_amt + $request->paid_amount;
        $request->validate([
            'booking_id' => 'required',
            'user_id' => 'required',
            'trans_date' => 'required|before_or_equal:today',
            'paid_amount' => 'required',
            'remain_amount' => 'required',
            'new_emi_amount' => 'required',
            'installment_no' => 'required',
            'given_by' => 'required',
            'status' => 'required',
            'remarks' => 'required',
        ]);
        $paid_amt = $installment->paid_amount;
        $installment->update($request->all() + ['total_paid_amt' => $total_paid_amt]);

        // Calculate remain amount
        $remainAmount = $installment->remain_amount - $request->paid_amount;

        // Check if remain amount is zero and set status accordingly
        $status = ($remainAmount == 0) ? 'Completed' : 'Unpaid';

        // Calculate next installment details
        $editedTransDate = Carbon::parse($installment->trans_date);
        $nextMonthFifthDay = $editedTransDate->copy()->addMonth()->startOfMonth()->addDays(4);
        $emi = $installment->emi - 1;
        $newInstallment = $remainAmount / $emi;

        // Create new installment
        $installment = Installment::create([
            'booking_id' => $installment->booking_id,
            'user_id' => $installment->user_id,
            'trans_date' => $nextMonthFifthDay,
            'paid_amount' => 0,
            'total_paid_amt' => $total_paid_amt,
            'remain_amount' => $remainAmount,
            'emi' => $installment->emi - 1,
            'new_emi_amount' => $newInstallment,
            'installment_no' => $request->input('installment_no'),
            'status' => $status,
            'remarks' => $installment->remarks,
        ]);

        $bookings = $installment->booking;
        $agentcommission = $request->input('paid_amount') * $bookings->agent_commisson  / 100;

        $ac = Agentcommission::create([
            'installment_id' => $installment->id,
            'agent_commission' => $agentcommission,
            'paid_agentcommission' => 0,
        ]);


        // return $ac;

        return redirect()->route('installment.index', $installment->booking->plot->sector->projectid)
            ->with('Success', 'Installment data updated successfully');
    }


    public function delete(string $id)
    {
        $installment = Installment::find($id);

        if ($installment) {
            $installment->delete();
            return redirect()->back()->with('Success', 'Installment Deleted Successfully');
        } else {
            return redirect()->back()->with('Success', 'Installment not found');
        }
    }
    public function restore(string $id)
    {
        $installment = Installment::withTrashed()->find($id);


        if ($installment) {
            $installment->restore();
            return redirect()->back()->with('Success', 'Installment restored Successfully');
        } else {
            return redirect()->back()->with('Success', 'Installment not found');
        }
    }
    public function destroy(string $id)
    {
        $installment = Installment::withTrashed()->find($id);

        if ($installment) {
            $installment->forceDelete();
            return redirect()->back()->with('Success', 'Installment Permenently deleted Successfully');
        } else {
            return redirect()->back()->with('Success', 'Installment not found');
        }
    }
}
