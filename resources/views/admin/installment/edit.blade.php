@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">UPDATE &nbsp;-&nbsp; INSTALLMENT</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a
                        href="{{ route('installment.index', $installments->booking->plot->sector->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('installment.update', $installments->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" value="{{ $installments->booking_id }}" name="booking_id">

                <div class="row">
                    <div class="col mb-3 d-flex">
                        {{-- <label for="user_id" class="form-label">Sales Partner Name</label> --}}<h3>Sales Partner Name : </h3>

                        @if ($installments->user !== null)
                            @if ($installments->user->name !== null)
                                <h3>{{ $installments->user->name }}</h3>
                            @else
                                <h3>Agent Deleted</h3>
                            @endif
                        @else
                            <h3>Agent Deleted</h3>
                        @endif
                        <input type="hidden" value="{{ $installments->user_id }}" name="user_id" class="form-control"
                            readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="trans_date" class="form-label">Trans Date</label>
                        <input type="date" value="{{ $installments->trans_date }}" name="trans_date"
                            class="form-control">
                        <span class="text-danger">
                            @error('trans_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="paid_amount" class="form-label">Paid Amount</label>
                        <input type="text" value="{{ $installments->new_emi_amount }}" name="paid_amount"
                            class="form-control" id="paid_amount">
                        <span id="paid_amount_error" class="text-danger"></span>
                        <span class="text-danger">
                            @error('paid_amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">

                    <div class="col mb-3">
                        <label for="remain_amount" class="form-label">Remain Amount</label>
                        <input type="remain_amount" value="{{ $installments->remain_amount }}" name="remain_amount"
                            class="form-control" id="remaining_amount" readonly>
                        <span class="text-danger">
                            @error('remain_amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="new_emi_amount" class="form-label">New Emi Amount</label>
                        <input type="new_emi_amount" value="{{ $installments->new_emi_amount }}" name="new_emi_amount"
                            class="form-control" readonly>
                        <span class="text-danger">
                            @error('new_emi_amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="installment_no" class="form-label">Installment No</label>
                        <input type="text" value="{{ $installments->installment_no + 1 }}" name="installment_no"
                            class="form-control" readonly>
                        <span class="text-danger">
                            @error('installment_no')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="given_by" class="form-label">Given By</label>
                        <input type="text" value="{{ old('given_by') }}" name="given_by" class="form-control">
                        <span class="text-danger">
                            @error('given_by')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <input type="hidden" name="status" value="Paid" id="">
                    <div class="col mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        {{-- <input type="text" id="remarks" value="{{$installments->remarks}}" name="remarks" class="form-control"> --}}
                        <textarea class="form-control" name="remarks" id="remarks" cols="5" rows="3">{{ $installments->remarks }}</textarea>
                        <span class="text-danger">
                            @error('remarks')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="col  mt-3 text-center">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        document.getElementById('paid_amount').addEventListener('change', function() {
            var paidCommission = parseFloat(this.value);
            var agentCommission = parseFloat(document.getElementById('remaining_amount').value);

            if (paidCommission > agentCommission) {
                // Display error message
                document.getElementById('paid_amount_error').innerText =
                    'Cannot add more than Remain_amount';
                // Clear the input field value
                this.value = '{{ $installments->new_emi_amount }}';
            } else {
                // Clear error message
                document.getElementById('paid_amount_error').innerText = '';
            }
        });
    </script>
@endsection
