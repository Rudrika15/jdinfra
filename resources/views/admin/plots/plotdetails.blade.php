@extends('layouts.app')
@section('content')
    <div class="container-fluid border border p-0 m-0">
        @if ($message = Session::get('Success'))
            <div class="alert alert-success" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            {{--  <div class="col-lg-6">
                <h2 class="text-white">BOOKING DETAILS OF {{ $history->plot->sector->project->title }}</h2>
            </div>  --}}

            <div class="col d-flex justify-content-end align-items-center">

                <a onclick="history.back()" class="btn me-2" style="background-color: #e3f2fd">Back</a>

                {{--  <span><a href="{{ route('bookingpdf', $history->id) }}" class="btn printButton btn-warning shadow-none"
                        id="printButton-{{ $history->id }}" data-id="{{ $history->id }}">Print</a>
                </span>  --}}
            </div>
        </div>

        {{--  @php
        return $history
    @endphp  --}}
        {{--  {{$history}}  --}}

        <div class="container-fluid p-5">
            <h2 class="text-center mb-5">Customer Details</h2>
            <div class="row">
                <div class="col mb-3">
                    <label for="membershipno" class="form-label">Membership No</label>
                    <input type="text" class="form-control" readonly value="{{ $history->membershipno }}"
                        name="membershipno" id="membershipno1" readonly>
                    <span class="text-danger">
                        @error('membershipno')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" value="{{ $history->fullname }}" name="fullname" class="form-control" readonly>
                    <span class="text-danger">
                        @error('fullname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="fathername" class="form-label">Father/Husband Name</label>
                    <input type="text" value="{{ $history->fathername }}" name="fathername" class="form-control"
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
                    <input type="date" value="{{ $history->dob }}" name="dob" class="form-control" readonly>
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" value="{{ $history->email }}" name="email" class="form-control" readonly>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" value="{{ $history->mobile }}" name="mobile" class="form-control" readonly>
                    <span class="text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="col mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea value="{{ $history->address }}" name="address" class="form-control" readonly>{{ $history->address }} </textarea>
                <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="doctype1" disabled class="form-label">Id Proof-1</label>
                    <input type="text" value="{{ $history->doctype1 }}" readonly class="form-control" name=""
                        id="">
                    <span class="text-danger">
                        @error('doctype1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="docnumber1" class="form-label">Documnet Number</label>
                    <input type="text" id="id_card_number_1" value="{{ $history->docnumber1 }}" name="docnumber1"
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
                    <input type="text" value="{{ $history->doctype2 }}" readonly class="form-control" name=""
                        id="">
                    <span class="text-danger">
                        @error('doctype2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="docnumber2" class="form-label">Documnet Number</label>
                    <input type="text" id="id_card_number_2" value="{{ $history->docnumber2 }}" name="docnumber2"
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
                    <input type="text" value="{{ $history->nomineename }}" name="nomineename" class="form-control"
                        readonly>
                    <span class="text-danger">
                        @error('nomineename')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="relation" class="form-label">Relation With Member</label>
                    <input type="text" value="{{ $history->relation }}" name="relation" class="form-control"
                        readonly>
                    <span class="text-danger">
                        @error('relation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="nomineemobile" class="form-label">Nominee Mobile</label>
                    <input type="text" value="{{ $history->nomineemobile }}" name="nomineemobile"
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
                <textarea type="text" value="{{ $history->nomineeaddress }}" name="nomineeaddress" class="form-control"
                    readonly> {{ $history->nomineeaddress }} </textarea>
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

                    <input type="text " readonly class="form-control" value="{{ $history->paymentmode }}"
                        name="" id="">
                </div>
                @if ($history->paymentmode != 'cash' && $history->paymentmode != 'upi')
                    <div class="col mb-3">

                        <label for="chequeno" class="form-label"> Cheque No </label>
                        <input type="text" value="{{ $history->chequeno }}" class="form-control" readonly
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
                    <input type="date" value="{{ $history->date }}" class="form-control" readonly name="date"
                        id="date">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">
                @if ($history->paymentmode != 'cash' && $history->paymentmode != 'upi')
                    <div class="col mb-3">
                        <label for="bankname" class="form-label"> Bank Name </label>
                        <input type="text" value="{{ $history->bankname }}" class="form-control" readonly
                            name="bankname" id="bankname">
                        <span class="text-danger">
                            @error('bankname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif
                @if ($history->paymentmode == 'upi')
                    <div class="col">
                        <label for="area" class="form-label"> UPI</label>
                        <input type="text" class="form-control" readonly value="{{ $history->upi }}" name="area"
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
                    <input type="text" class="form-control" readonly value="{{ $history->area }}" name="area"
                        id="area" readonly>
                    <span class="text-danger">
                        @error('area')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="history_amount" class="form-label">Booking Amount</label>
                    <input type="text" value="{{ $history->booking_amount }}" class="form-control" readonly
                        name="history_amount" id="history_amount">
                    <span class="text-danger">
                        @error('history_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="agent_commisson" class="form-label">Agent Commission</label>
                    <input type="text" class="form-control" readonly value="{{ $history->agent_commisson }}"
                        name="agent_commisson" id="agent_commisson">
                    <span class="text-danger">
                        @error('agent_commisson')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="sell_amount" class="form-label">Total Cost</label>
                    <input type="text" value="{{ $history->sell_amount }}" class="form-control" readonly
                        name="sell_amount" id="sell_amount">
                    <span class="text-danger">
                        @error('sell_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="emi" class="form-label">No Of Emi</label>
                    <input type="number" value="{{ $history->emi }}" class="form-control" readonly name="emi"
                        id="emi">
                    <span class="text-danger">
                        @error('emi')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <label for="remarks">Remarks</label>
            <textarea class="form-control" readonly value="{{ $history->remarks }}" name="remarks" id=""
                cols="10" rows="5" readonly>{{ $history->remarks }}</textarea>
        </div>

        <hr>
        <div class="container-fluid p-5">

            <h2 class="text-center">Installment Details</h2>

            <br>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        @if (Auth::user()->usertype == 'admin')
                            <th>Agent Name</th>
                        @endif
                        <th>Transaction Date</th>
                        <th>Booking Amount</th>
                        <th>Paid Amount</th>
                        <th>Remain Amount</th>
                        <th>New EMI Amount</th>
                        <th>EMI No</th>
                        <th>Installment No</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPaidAmount = 0; // Initialize the variable to hold the total paid amount
                        $totalUnpaidRemainAmount = 0; // Initialize the variable to hold the total remain amount for Unpaid status
                    @endphp
                    @foreach ($history->installment as $item)
                        {{-- @if ($item->status == 'Paid') --}}
                        {{-- Display installment for "Paid" status --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (Auth::user()->usertype == 'admin')
                                <td>{{ $item->user->name }}</td>
                            @endif
                            <td>{{ $item->trans_date }}</td>
                            <td>{{ $history->booking_amount }}</td>
                            <td>{{ $item->paid_amount }}</td>
                            <td>{{ $item->remain_amount }}</td>
                            <td>{{ $item->new_emi_amount }}</td>
                            <td>{{ $item->emi }}</td>
                            <td>{{ $item->installment_no }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->remarks }}</td>

                            @php
                                $totalPaidAmount += $item->paid_amount;
                                // Add current paid amount to the total
                            @endphp
                        </tr>
                        {{-- @elseif ($item->status == 'Unpaid') --}}
                        {{-- Calculate total remain amount for "Unpaid" status --}}
                        @php
                            $totalUnpaidRemainAmount += $item->remain_amount; // Add current remain amount to the total for Unpaid status
                        @endphp
                        {{-- @endif --}}
                    @endforeach
                    @php
                        $booking_amt = $history->booking_amount;
                    @endphp
                    <tr>
                        <td colspan="3">Total Paid Amount (Status: Paid):</td>
                        @if ($history->status = 'Paid')
                            <td>{{ $totalPaidAmount + $booking_amt }}</td>
                        @else
                            <td>{{ $totalPaidAmount }}</td>
                        @endif

                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total Remain Amount (Status: Unpaid):</td>
                        <td>{{ $totalUnpaidRemainAmount }}</td>
                        <td colspan="6"></td>
                    </tr>
                </tbody>
            </table>


            {{--  @if (Auth::user()->usertype == 'admin')
                <a href="{{ route('plot.resold', $history->id) }}" onclick="return confirm('Do You Want To Resold It ')"
                    class="btn btn-primary">Resold</a>
            @endif  --}}
        </div>
    </div>
    </div>
@endsection
