@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">Pay &nbsp;-&nbsp; Commission</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a
                        href="{{ route('agentcommission', $installments->booking->plot->sector->projectid) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('updateagentcommission') }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="installment_id" value="{{ $installments->id }}">
                        <label for="agent_commission"> Pending Commission </label>
                        @if ($installments->agentcommission->isNotEmpty())
                            @foreach ($installments->agentcommission->take(1) as $installment)
                                <input type="text" class="form-control" value="{{ $installment->agent_commission }}"
                                    name="agent_commission" id="agent_commission" readonly>
                                <span class="text-danger">
                                    @error('agent_commission')
                                        {{ $message }}
                                    @enderror
                                </span>
                            @endforeach
                        @else
                            <input type="text" class="form-control"
                                value="{{ ($installments->paid_amount * $installments->booking->agent_commisson) / 100 }}"
                                name="agent_commission" id="agent_commission" readonly>
                            <span class="text-danger">
                                @error('agent_commission')
                                    {{ $message }}
                                @enderror
                            </span>
                        @endif



                    </div>


                    <div class="col">
                        <label for="paid_commission">Pay Commission</label>
                        <input type="text" class="form-control" name="paid_agentcommission" id="paid_commission">
                        <span id="paid_commission_error" class="text-danger"></span>
                        <span class="text-danger">
                            @error('paid_agentcommission')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <script>
                        document.getElementById('paid_commission').addEventListener('change', function() {
                            var paidCommission = parseFloat(this.value);
                            var agentCommission = parseFloat(document.getElementById('agent_commission').value);

                            if (paidCommission > agentCommission) {
                                // Display error message
                                document.getElementById('paid_commission_error').innerText =
                                    'Cannot add more than pending commission';
                                // Clear the input field value
                                this.value = '';
                            } else {
                                // Clear error message
                                document.getElementById('paid_commission_error').innerText = '';
                            }
                        });
                    </script>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <label for="paid_commission">Transection Date</label>
                        <input type="date" class="form-control" name="transection_date" id="transection_date">
                        <span class="text-danger">
                            @error('transection_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Pay Now</button>

                    </div>
                </div>
        </div>
    @endsection
