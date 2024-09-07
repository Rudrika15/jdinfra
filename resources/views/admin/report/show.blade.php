@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-3 mb-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <ul class="text-white">
                    @if (!is_null($criteria['project']))
                        <li>Project: {{ $criteria['project'] }}</li>
                    @endif
                    @if (Auth::user()->usertype == 'admin')
                        @if (!is_null($criteria['agent']))
                            <li>Agent: {{ $criteria['agent'] }}</li>
                        @endif
                    @endif
                    @if (!is_null($criteria['status']))
                        <li>Status: {{ $criteria['status'] }}</li>
                    @endif
                    @if (!is_null($criteria['strt_date']))
                        <li>Start Date: {{ $criteria['strt_date'] }}</li>
                    @endif
                    @if (!is_null($criteria['end_date']))
                        <li>End Date: {{ $criteria['end_date'] }}</li>
                    @endif
                    @if (empty($criteria['project']) &&
                            empty($criteria['agent']) &&
                            empty($criteria['status']) &&
                            empty($criteria['strt_date']) &&
                            empty($criteria['end_date']))
                        <h3>Showing All records</h3>
                    @endif
                </ul>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('report.index') }}" class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
    </div>
    @if ($installment->isNotEmpty())
        <table class="table table-bordered mt-3" id="installmentsTable">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Sector Name</th>
                    <th>Plot no</th>
                    <th>Plot Size</th>
                    <th>Client Name</th>
                    <th>Mobile</th>
                    @if (Auth::user()->usertype == 'admin')
                        <th>Agent Name</th>
                    @endif
                    <th>Pending Agent commission</th>
                    <th>Paid Agent commission</th>
                    <th>Transaction Date</th>
                    <th>Paid Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($installment as $item)
                    @foreach ($item->agentcommission as $agentcommission)
                        <tr>
                            <td>{{ $item->booking->plot->sector->project->title ?? '-' }}</td>
                            <td>Sector-{{ $item->booking->plot->sector->sectorname ?? '-' }}</td>
                            <td>Plot-{{ $item->booking->plotnumber ?? '-' }}</td>
                            <td>{{ $item->booking->plot->area ?? '-' }}</td>
                            <td>{{ $item->booking->fullname ?? '-' }}</td>
                            <td>{{ $item->booking->mobile ?? '-' }}</td>
                            @if (Auth::user()->usertype == 'admin')
                                <td>{{ $item->booking->user->name ?? 'null' }}</td>
                            @else
                                <td>null</td>
                            @endif
                            <td>{{ $agentcommission->agent_commission ?? '0' }}</td>

                            <td>{{ $agentcommission->paid_agentcommission ?? '0' }}</td>

                            <td>{{ $item->trans_date }}</td>
                            <td>{{ $item->paid_amount }}</td>
                            <td>{{ $item->status }}</td>
                            @if ($item->booking)
                                <td><a href="{{ route('installment.viewmore', $item->booking->id) }}"
                                        class="btn btn-warning shadow-none btn-sm text-nowrap">View More</a></td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                <tr>
                    <td colspan="7">
                        <h5>Total:</h5>
                    </td>

                    @php
                        // $totalPaidAmount = $installment->sum('paid_amount');

                        // $totalCommission = $installment
                        //     ->flatMap(function ($item) {
                        //         return $item->agentcommission->filter(function ($agentcommission) use ($item) {
                        //             return $item->status == 'Paid';
                        //         });
                        //     })
                        //     ->sum('agent_commission');
                        $totalPaidCommission = $installment->flatMap->agentcommission->sum('paid_agentcommission');
                        $totalCommission = $installment->flatMap->agentcommission->sum('agent_commission');
                    @endphp

                    <td>
                        <h5>{{ $totalCommission }}</h5>
                    </td>
                    <td>
                        <h5>{{ $totalPaidCommission }}</h5>
                    </td>
                    <td></td>

                    <td id="totalPaidAmount"></td>

                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="ms-5 me-5 d-flex justify-content-center alert alert-danger mt-5">
            <strong>No records Found</strong>
        </div>
    @endif


    <script>
        // Ensure the DOM is fully loaded before running the script
        document.addEventListener('DOMContentLoaded', function() {
            var paidAmountCells = document.querySelectorAll(
                '#installmentsTable tbody td:nth-child(11)'); // Adjust the selector if necessary
            var totalPaidAmount = 0;

            // Loop through each td element and add its value to totalPaidAmount
            paidAmountCells.forEach(function(cell) {
                var value = parseFloat(cell.textContent.trim());
                if (!isNaN(value)) {
                    totalPaidAmount += value;
                } else {
                    console.error('Invalid value detected:', cell.textContent.trim());
                }
            });

            // Display the total paid amount
            // console.log('Total Paid Amount:', totalPaidAmount);
            document.getElementById('totalPaidAmount').innerHTML = '<h5> ' + totalPaidAmount +
                '</h5>';

        });
    </script>
@endsection
