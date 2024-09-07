<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agentcommission;
use App\Models\Installment;
use Illuminate\Http\Request;

class AgentCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Agentcommission $Agentcommission)
    {
        $request->validate([
            'agent_commission' => 'required',
            'paid_agentcommission' => 'required|regex:/^[0-9]/',
            'transection_date' => 'required|before_or_equal:today',
            'installment_id' => 'required'
        ]);
        $installmentId = $request->input('installment_id');

        // Find the Installment by its ID
        $installment = Installment::find($installmentId);
        $input = $request->all();
        $Agentcommission->create($input);

        return \redirect()->route('agentcommission', $installment->booking->plot->sector->projectid);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'agent_commission' => 'required',
            'paid_agentcommission' => 'required|numeric', // Updated validation rule
            'transection_date' => 'required|before_or_equal:today',
            'installment_id' => 'required'
        ]);

        $installmentId = $request->input('installment_id');

        // Find the Agentcommission by its installment ID
        $Agentcommission = Agentcommission::where('installment_id', $installmentId)->firstOrFail();

        // Calculate the remaining commission
        $remainingCommission = $request->input('agent_commission') - $request->input('paid_agentcommission');
        $commission = $request->input('paid_agentcommission') + $Agentcommission->paid_agentcommission;

        // Prepare data for updating agent commission
        $input = [
            'agent_commission' => $remainingCommission,
            'paid_agentcommission' => $commission,
            'transection_date' => $request->input('transection_date')
        ];

        // Update the Agentcommission
        $Agentcommission->update($input);

        // Find the Installment by its ID
        $installment = Installment::find($installmentId);

        return redirect()->route('agentcommission', $installment->booking->plot->sector->projectid)
            ->with('success', 'Commission Paid Successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
