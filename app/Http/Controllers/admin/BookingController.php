<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agentcommission;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Coordinate;
use App\Models\Editor;
use App\Models\Installment;
use App\Models\Plotmaster;
use App\Models\Project;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{

    public function viewbooking(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = Auth::user();
            $agentId = $user->id;

            $query = Booking::with('plot.sector.project', 'user')
                ->whereHas('plot.sector.project', function ($query) use ($id) {
                    $query->where('id', $id)
                        ->where('status', 'Hold');
                })
                ->whereNotNull('agent_commisson')
                ->select('*');

            // If the user is an agent, filter bookings for the logged-in agent only
            if ($user->usertype == 'Agent') {
                $query->where('agent', $agentId);
            }

            $data = $query->get();
            // $data = $query->onlyTrashed();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Agent_Name', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('action', function ($row) use ($user) {
                    $btn = '<a href="/admin/booking/officedetails/' . $row->id . '" class="view btn btn-warning shadow-none btn-sm mb-2">View More</a>';

                    // Check if the user type is 'admin' before adding 'Edit' and 'Delete' buttons
                    if ($user->usertype == 'admin') {
                        $edit = '<a href="/admin/booking/edit/' . $row->id . '" class="edit btn btn-primary shadow-none btn-sm mb-2"> Edit</a>';
                        $delete = '<a href="/admin/booking/delete/' . $row->id . '" class="delete-client btn btn-danger shadow-none btn-sm mb-2" onclick="return confirm(\'Do you want to delete it?\')"> Delete</a>';

                        // Add 'Edit' and 'Delete' buttons to the $btn variable
                        $btn .= ' ' . $edit . ' ' . $delete;
                    }

                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        $project = Project::find($id);
        return view('admin.booking.viewbooking', compact('project'));
    }




    public function officedetails(Request $request, $id)
    {
        $bookings = Booking::find($id);
        $agent = $bookings->agent ? User::find($bookings->agent) : null;
        $agent_name = $agent ? $agent->name : '';

        return \view('admin.booking.officedetails', \compact('bookings', 'agent_name'));
    }
    public function pdf($id)
    {
        $bookings = Booking::find($id);
        $installmentId = Installment::find($id);
        // $data = $bookings::all();
        // $pdf = Pdf::loadView('admin.booking.pdf', \compact('bookings', 'agent_name'));
        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->download($bookings->membershipno . '.pdf');
        return \view('admin.booking.pdf', \compact('bookings',  'installmentId'));
    }
    public function bookingpdf($id)
    {
        $bookings = Booking::find($id);
        // $project = Project::find($bookings->plot->sector->project->id);
        $project = $bookings->plot->sector->project;
        $editor = $project->editor;
        // return  $pid;
        // return $editor;

        return \view('admin.booking.bookingpdf', \compact('bookings', 'editor'));
    }
    public function newbooking(Request $request, $id = 0)
    {
        $clients = Client::all();
        $plots = Plotmaster::find($id);
        $users = User::where('usertype', 'Agent')->whereNull('status')->get();
        return \view('admin.booking.newbooking', compact('clients', 'plots', 'users'));
    }
    public function store(Request $request)
    {

        // return $request;
        $request->validate([
            'plotid' => 'required',
            'plotnumber' => 'required',
            'membershipno' => 'required|regex:/^[A-Za-z0-9\-]+$/',
            'fullname' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'fathername' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|regex:/^[A-Za-z0-9.@]+$/|max:255',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'address' => 'required',
            'doctype1' => 'required',
            'docnumber1' => 'required',
            'doctype2' => 'required',
            'docnumber2' => 'required',
            'nomineename' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'relation' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'nomineemobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'nomineeaddress' => 'required',
            'paymentmode' => 'required|in:cash,cheque,upi',
            'date' => 'required|date|before_or_equal:today',
            // 'upi' => 'required_if:paymentmode,upi|regex:/^[a-zA-Z0-9.-]{8,256}@[a-zA-Z]{8,64}$/',
            'agent' => 'required',
            'agentmobile' => 'required',
            'booking_amount' => 'required|integer|min:0',
            // 'agent_commisson' => 'required|numeric|min:0|max:100',
            'sell_amount' => 'required|integer|min:0',
            'emi' => 'required|integer|min:1',
            'remarks' => 'required',
        ]);
        // dd($request);
        $input = $request->all();
        $input['membershipno'] = $request->input('membershipno');
        //dd($input);
        // return $input;

        $plot = Plotmaster::find($request->plotid);
        $plot->status = 'Hold';
        $plot->save();

        $coordinates = Coordinate::where('plot_id', $request->plotnumber)
            ->where('sector_name', $plot->sector->sectorname)
            ->where('projectid', $plot->sector->projectid)
            ->first();
        $coordinates->book_status = 'Hold';
        $coordinates->save();

        $booking =  Booking::create($input);
        $remainAmount = $request->input('sell_amount') - $request->input('booking_amount');
        $nextMonth = Carbon::now()->addMonth()->startOfMonth()->addDays(4);
        $installmentdata = [
            'installment_no' => 0,
            'booking_id' => $booking->id,
            'user_id' => $request->input('agent'),
            'trans_date' => $nextMonth,
            'paid_amount' => $request->booking_amount,
            'total_paid_amt' => $request->booking_amount,
            'remain_amount' => $remainAmount,
            'new_emi_amount' => $remainAmount / $request->input('emi'),
            'emi' => $request->input('emi'),
            'status' =>  'Unpaid',
            'remarks' => $request->input('remarks'),
        ];

        $installment = new Installment($installmentdata);
        $installment->user_id = $request->agent;
        $installment->save();

        $bookings = $installment->booking;
        $agentcommission = $request->input('booking_amount') * $bookings->agent_commisson  / 100;

        $ac = Agentcommission::create([
            'installment_id' => $installment->id,
            'agent_commission' => $agentcommission,
            'paid_agentcommission' => 0,
        ]);

        return redirect()->route('admin.booking.viewbooking', $installment->booking->plot->sector->project->id)
            ->with('success', 'booking data added successfully');
    }
    public function edit(Request $request, $id)
    {
        $booking = Booking::find($id);

        $plots = Plotmaster::find($id);
        $users = User::where('usertype', 'Agent')->whereNull('status')->get();
        return \view('admin.booking.edit', \compact('booking', 'plots', 'users'));
    }
    public function update(Request $request, Booking $booking)
    {
        // return $booking->id;
        $request->validate([
            'plotid' => '',
            'plotnumber' => '',
            'membershipno' => 'required|regex:/^[A-Za-z0-9\-]+$/',
            'fullname' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'fathername' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'dob' => 'required|date|before:today',
            'email' => [
                'required',
                'email',
                'regex:/^[A-Za-z0-9.@]+$/',
                'max:255',
            ],
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'nomineename' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'relation' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'nomineemobile' => 'required|digits:10',
            'nomineeaddress' => '',
            'date' => '|date|before_or_equal:today',
            'booking_amount' => '|integer|min:0',
            // 'agent_commisson' => '|regex:/^(\d+(\.\d+)?%?)$/|min:0|max:100',
            'sell_amount' => '|integer|min:0',
            'emi' => '|integer|min:1',
            'remarks' => '',

        ]);
        $input = $request->all();
        // dd($input);
        $booking->update($input);
        return redirect()->route('admin.booking.viewbooking', $booking->plot->sector->project->id)
            ->with('success', 'booking data updated successfully');
    }

    public function delete($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('success', 'Booking not found');
        }

        // Get the associated plot
        $plot = $booking->plot;

        // Change the status of the plot to "Unsold"
        $plot->status = 'Unsold';
        $plot->save();

        // Soft delete the booking
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully');
    }

    public function restore($id)
    {
        $booking = Booking::withTrashed()->find($id);


        if (!$booking) {
            return redirect()->back()->with('success', 'Booking not found');
        }

        // Get the associated plot
        $plot = $booking->plot;

        // Change the status of the plot to "Unsold"
        $plot->status = 'sold';
        $plot->save();

        // Soft delete the booking
        $booking->restore();

        return redirect()->back()->with('success', 'Booking restored successfully');
    }
    public function destroy($id)
    {
        $booking = Booking::withTrashed()->find($id);

        if (!$booking) {
            return redirect()->back()->with('success', 'Booking not found');
        }

        // Get the associated plot
        $plot = $booking->plot;

        // Change the status of the plot to "Unsold"
        $plot->status = 'Unsold';
        $plot->save();

        // Soft delete the booking
        $booking->forceDelete();

        return redirect()->back()->with('success', 'Booking permanently delete successfully');
    }

    public function trashview(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = Auth::user();
            $agentId = $user->id;

            $query = Booking::with('plot.sector.project', 'user')
                ->whereHas('plot.sector.project', function ($query) use ($id) {
                    $query->where('id', $id);
                })
                ->whereNotNull('agent_commisson')
                ->select('*');

            // If the user is an agent, filter bookings for the logged-in agent only
            if ($user->usertype == 'Agent') {
                $query->where('agent', $agentId);
            }

            // $data = $query->get();
            $data = $query->onlyTrashed();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Agent_Name', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('action', function ($row) use ($user) {
                    // $btn = '<a href="/admin/booking/officedetails/' . $row->id . '" class="view btn btn-warning shadow-none btn-sm mb-2">View More</a>';

                    // Check if the user type is 'admin' before adding 'Edit' and 'Delete' buttons
                    if ($user->usertype == 'admin') {
                        $edit = '<a  href="/admin/booking/restore/' . $row->id . '" class="edit btn btn-primary shadow-none btn-sm mb-2" onclick="return confirm(\'do you want to restore it\')"> Restore</a>';
                        $delete = '<a href="/admin/booking/delete/' . $row->id . '" class="delete-client btn btn-danger shadow-none btn-sm mb-2" onclick="return confirm(\'Do you want to permanently delete it?\')"> Delete</a>';

                        // Add 'Edit' and 'Delete' buttons to the $btn variable
                        return $edit . ' ' . $delete;
                    }
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        $project = Project::find($id);
        return view('admin.booking.trashbookingdata', compact('project'));
    }
}
