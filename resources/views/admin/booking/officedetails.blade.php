@extends('layouts.app')
@section('content')
    <div class="container-fluid border border p-0 m-0">
        @if ($message = Session::get('Success'))
            <div class="alert alert-success" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">BOOKING DETAILS OF {{ $bookings->plot->sector->project->title }}</h4>
            </div>

            <div class="col-lg-6 d-flex justify-content-end align-items-center">


                <span><a href="{{ route('bookingpdf', $bookings->id) }}" class="btn printButton btn-warning shadow-none"
                        id="printButton-{{ $bookings->id }}" data-id="{{ $bookings->id }}">Print</a>
                    <a onclick="history.back()" class="btn me-2" style="background-color: #e3f2fd">Back</a>
                </span>
            </div>
        </div>

        <div class="container-fluid p-5">
            <h2 class="text-center mb-5">Membership Form</h2>
            <div class="row">
                <div class="col mb-3">
                    <label for="membershipno" class="form-label">Membership No</label>
                    <input type="text" class="form-control" readonly value="{{ $bookings->membershipno }}"
                        name="membershipno" id="membershipno1" readonly>
                    <span class="text-danger">
                        @error('membershipno')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" value="{{ $bookings->fullname }}" name="fullname" class="form-control" readonly>
                    <span class="text-danger">
                        @error('fullname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="fathername" class="form-label">Father/Husband Name</label>
                    <input type="text" value="{{ $bookings->fathername }}" name="fathername" class="form-control"
                        readonly>
                    <span class="text-danger">
                        @error('fathername')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">

                <div class="col mb-3">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" value="{{ $bookings->dob }}" name="dob" class="form-control" readonly>
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" value="{{ $bookings->email }}" name="email" class="form-control" readonly>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" value="{{ $bookings->mobile }}" name="mobile" class="form-control" readonly>
                    <span class="text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea value="{{ $bookings->address }}" name="address" class="form-control" readonly>{{ $bookings->address }} </textarea>
                <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="doctype1" disabled class="form-label">Id Proof-1</label>
                    <input type="text" value="{{ $bookings->doctype1 }}" readonly class="form-control" name=""
                        id="">
                    <span class="text-danger">
                        @error('doctype1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="docnumber1" class="form-label">Documnet Number</label>
                    <input type="text" id="id_card_number_1" value="{{ $bookings->docnumber1 }}" name="docnumber1"
                        class="form-control" readonly>
                    <span class="text-danger">
                        @error('docnumber1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="doctype2" class="form-label">Id Proof-2</label>
                    <input type="text" value="{{ $bookings->doctype2 }}" readonly class="form-control" name=""
                        id="">
                    <span class="text-danger">
                        @error('doctype2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="docnumber2" class="form-label">Documnet Number</label>
                    <input type="text" id="id_card_number_2" value="{{ $bookings->docnumber2 }}" name="docnumber2"
                        class="form-control" readonly>
                    <span class="text-danger">
                        @error('docnumber2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="nomineename" class="form-label">Nominee Name</label>
                    <input type="text" value="{{ $bookings->nomineename }}" name="nomineename" class="form-control"
                        readonly>
                    <span class="text-danger">
                        @error('nomineename')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="relation" class="form-label">Relation With Member</label>
                    <input type="text" value="{{ $bookings->relation }}" name="relation" class="form-control"
                        readonly>
                    <span class="text-danger">
                        @error('relation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="nomineemobile" class="form-label">Nominee Mobile</label>
                    <input type="text" value="{{ $bookings->nomineemobile }}" name="nomineemobile"
                        class="form-control" readonly>
                    <span class="text-danger">
                        @error('nomineemobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="col mb-3">
                <label for="nomineeaddress" class="form-label">Nominee address</label>
                <textarea type="text" value="{{ $bookings->nomineeaddress }}" name="nomineeaddress" class="form-control"
                    readonly> {{ $bookings->nomineeaddress }} </textarea>
                <span class="text-danger">
                    @error('nomineeaddress')
                        {{ $message }}
                    @enderror
                </span>
            </div>

        </div>
        <hr>
        <div class="container-fluid p-5">
            <h2 class="text-center mb-5 "> Office Details </h2>
            <div class="row">
                <div class="col mb-3 ">
                    <label for="paymentmode" class="form-label"> Payment Mode </label>

                    <input type="text " readonly class="form-control" value="{{ $bookings->paymentmode }}"
                        name="" id="">
                </div>
                @if ($bookings->paymentmode != 'cash' && $bookings->paymentmode != 'upi')
                    <div class="col mb-3">

                        <label for="chequeno" class="form-label"> Cheque No </label>
                        <input type="text" value="{{ $bookings->chequeno }}" class="form-control" readonly
                            name="chequeno" id="chequeno">
                        <span class="text-danger">
                            @error('chequeno')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif
                <div class="col mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" value="{{ $bookings->date }}" class="form-control" readonly name="date"
                        id="date">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">
                @if ($bookings->paymentmode != 'cash' && $bookings->paymentmode != 'upi')
                    <div class="col mb-3">
                        <label for="bankname" class="form-label"> Bank Name </label>
                        <input type="text" value="{{ $bookings->bankname }}" class="form-control" readonly
                            name="bankname" id="bankname">
                        <span class="text-danger">
                            @error('bankname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif
                @if ($bookings->paymentmode == 'upi')
                    <div class="col">
                        <label for="area" class="form-label"> UPI</label>
                        <input type="text" class="form-control" readonly value="{{ $bookings->upi }}" name="area"
                            id="area" readonly>
                        <span class="text-danger">
                            @error('area')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif

                <div class="col mb-3">

                    <label for="area" class="form-label"> Plot Size </label>
                    <input type="text" class="form-control" readonly value="{{ $bookings->area }}" name="area"
                        id="area" readonly>
                    <span class="text-danger">
                        @error('area')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            @if (Auth::user()->usertype == 'admin')
                <div class="row">
                    <div class="col mb-3">
                        <label for="agent" class="form-label"> Sales Partner Name </label>
                        <input type="text" readonly class="form-control" value="{{ $agent_name }}" name=""
                            id="">
                        <span class="text-danger">
                            @error('agent')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="agentmobile" class="form-label">Agent Mobile </label>
                        <input type="text" class="form-control" readonly value="{{ $bookings->agentmobile }}"
                            name="agentmobile" id="agentmobile" readonly>
                        <span class="text-danger">
                            @error('agentmobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
            @endif
            <div class="row">
                <div class="col mb-3">
                    <label for="bookings_amount" class="form-label">Booking Amount</label>
                    <input type="text" value="{{ $bookings->booking_amount }}" class="form-control" readonly
                        name="bookings_amount" id="bookings_amount">
                    <span class="text-danger">
                        @error('bookings_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="agent_commisson" class="form-label">Agent Commission</label>
                    <input type="text" class="form-control" readonly value="{{ $bookings->agent_commisson }}"
                        name="agent_commisson" id="agent_commisson">
                    <span class="text-danger">
                        @error('agent_commisson')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="sell_amount" class="form-label">Total Cost</label>
                    <input type="text" value="{{ $bookings->sell_amount }}" class="form-control" readonly
                        name="sell_amount" id="sell_amount">
                    <span class="text-danger">
                        @error('sell_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="emi" class="form-label">No Of Emi</label>
                    <input type="number" value="{{ $bookings->emi }}" class="form-control" readonly name="emi"
                        id="emi">
                    <span class="text-danger">
                        @error('emi')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <label for="remarks">Remarks</label>
            <textarea class="form-control" readonly value="{{ $bookings->remarks }}" name="remarks" id=""
                cols="10" rows="5" readonly>{{ $bookings->remarks }}</textarea>
        </div>

        <hr>
        <div class="container-fluid p-5">

            <h4 class="text-center">Installment Details</h4>

            <br>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        @if (Auth::user()->usertype == 'admin')
                            <th>Agent Name</th>
                        @endif

                        <th>Next Installment Date</th>
                        <th>Booking Amt</th>
                        <th>Paid Amt</th>
                        <th>Remaining Amt</th>
                        <th>Next Emi Amount</th>
                        <th>EMI No</th>
                        <th>Installment No</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($bookings->installment as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{--  <td>{{ $item->booking_id }}</td>  --}}
                        <td>{{ $item->booking->fullname }}</td>

                        @if (Auth::user()->usertype == 'admin')
                            <td>{{ $item->user->name }}</td>
                        @endif
                        <td>{{ $item->trans_date }}</td>
                        <td>{{ $item->booking->booking_amount }}</td>
                        <td>{{ $item->paid_amount }}</td>
                        <td>{{ $item->remain_amount }}</td>
                        <td>{{ $item->new_emi_amount }}</td>
                        <td>{{ $item->emi }}</td>
                        @if ($item->status == 'Paid')
                            <td>{{ $item->installment_no }}</td>
                        @else
                            <td>{{ $item->installment_no + 1 }}</td>
                        @endif
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->remarks }}</td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            @if (Auth::user()->usertype == 'admin')
                <a href="{{ route('plot.resold', $bookings->id) }}" onclick="return confirm('Do You Want To Resold It ')"
                    class="btn btn-primary">Resold</a>
            @endif
        </div>
    </div>
    </div>
    <iframe id="pdfFrame" style="display:none" width="0" height="0"></iframe>

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
                    var url = "{{ route('bookingpdf', ':id') }}".replace(':id', id);
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
