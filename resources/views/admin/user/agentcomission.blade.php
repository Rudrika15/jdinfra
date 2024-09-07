@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row m-0 p-3 d-flex flex-row-reverse" style="background-color: #0b6ab2">
            <div class="col-lg-1 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
            <div class="col-lg-11">
                <h2 class="text-white">
                    @if ($agentcommissions->isNotEmpty())
                        PENDING COMMISSION OF
                        {{ $agentcommissions->first()->installment->booking->plot->sector->project->title }}
                    @else
                        There is no Pending Commission to pay for
                        {{ $agentcommissions->first()->installment->booking->plot->sector->project->title ?? 'this project' }}
                    @endif
                </h2>
            </div>

        </div>

        @if ($agentcommissions->isNotEmpty())
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Agent Name</th>
                        <th>Agent Code</th>
                        <th>Agent Mobile</th>
                        <th>Sector Name</th>
                        <th>Plot Number</th>
                        <th>Installment No</th>
                        <th>Remaining Agent Commission</th>
                        <th>Paid Agent Commission</th>
                        <th>Pay Commission</th>
                    </tr>
                </thead>
                @php
                    $counter = 1;
                @endphp

                <tbody>
                    @foreach ($agentcommissions as $agentcommission)
                        @php
                            $installment = $agentcommission->installment;
                            $booking = $installment->booking;
                            $plot = $booking->plot;
                            $sector = $plot->sector;
                            $project = $sector->project;
                        @endphp
                        @if ($agentcommission->agent_commission > 0)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $installment->user->name }}</td>
                                <td>{{ $installment->user->agentcode }}</td>
                                <td>{{ $installment->user->mobile }}</td>
                                <td>Sector {{ $sector->sectorname }}</td>
                                <td>Plot {{ $plot->plotnumber }}</td>
                                <td>{{ $installment->installment_no }}</td>
                                <td>{{ $agentcommission->agent_commission }}</td>
                                <td>
                                    {{ $installment->agentcommission->sum('paid_agentcommission') }}
                                </td>
                                <td>
                                    <a href="{{ route('agentcommission.edit', $agentcommission->id) }}"
                                        class="btn btn-success shadow-none">Pay</a>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
