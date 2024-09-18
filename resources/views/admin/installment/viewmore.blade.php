@extends('layouts.app')
@section('content')
    <div class="container-fluid  p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">INSTALLMENTS DETAILES OF {{ $bookings->plot->sector->project->title }}</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float: right">
                    <a onclick="history.back()" class="btn" style="background-color: #e3f2fd">Back</a>
                </span>
            </div>
        </div>


        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Agent Name</th>
                    <th>Transaction Date</th>
                    <th>Total Paid Amount</th>
                    <th>Remain Amount</th>
                    <th>New EMI Amount</th>
                    <th>EMI No</th>
                    <th>Installment No</th>
                    <th>Given By</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($bookings->installment as $item)
                <tr class="text-nowrap">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->booking->fullname }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->trans_date }}</td>
                    <td>{{ $item->paid_amount }}</td>
                    <td>{{ $item->remain_amount }}</td>
                    <td>{{ $item->new_emi_amount }}</td>
                    <td>{{ $item->emi }}</td>
                    @if ($item->status == 'Unpaid' || $item->status == 'Completed')
                        <td>{{ $item->installment_no + 1 }}</td>
                    @else
                        <td>{{ $item->installment_no }}</td>
                    @endif
                    <td>{{$item->given_by}}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->remarks }}</td>
                    <td>
                        @if ($item->status != 'Unpaid')
                            <a class="btn btn-warning shadow-none text-nowrap printButton"
                                id="printButton-{{ $item->id }}" data-id="{{ $item->id }}">Print Receipt</a>
                            <iframe id="pdfFrame" style="display:none" width="0" height="0"></iframe>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('click', function(event) {
            // Check if a printButton was clicked
            if (event.target.classList.contains('printButton')) {
                // Prevent the default form submission
                event.preventDefault();

                // Get the ID from the HTML element
                var id = event.target.getAttribute('data-id');

                // Check if the ID is not null or undefined
                if (id) {
                    // Set the iframe's src to the PDF URL
                    var pdfFrame = document.getElementById('pdfFrame');
                    var url = "{{ route('pdf', ':id') }}".replace(':id', id);
                    pdfFrame.src = url;

                    // Set the iframe's onload event listener
                    pdfFrame.onload = function() {
                        // Print the PDF
                        pdfFrame.contentWindow.print();

                        // Remove the iframe from the DOM
                        // document.body.removeChild(pdfFrame);
                    };
                } else {
                    console.log('ID not found');
                }
            }
        });
    </script>
@endsection
