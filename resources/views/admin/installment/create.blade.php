@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-3 g-5">
            <span>Installment</span>
            <span style="float:right; padding-left:44px"><a href="{{ route('installment.index') }}"
                    class="btn btn-primary">Installment view</a></span>
            <span style="float:right; padding-left:44px"><a href="{{ route('admin.dashboard') }}"
                    class="btn btn-primary">Back</a></span>
        </div>


        <form action="{{ route('installment.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="booking_id" class="form-label">Booking_id</label>
                    <input type="text" value="{{ old('booking_id') }}" name="booking_id" class="form-control"
                        id="title">
                    <span class="text-danger">
                        @error('booking_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="user_id" class="form-label">User_id</label>
                    <input type="text" value="{{ old('user_id') }}" name="user_id" class="form-control" id="title">
                    <span class="text-danger">
                        @error('user_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="trans_date" class="form-label">Trans_date</label>
                    <input type="date" value="{{ old('trans_date') }}" name="trans_date" class="form-control"
                        id="title">
                    <span class="text-danger">
                        @error('trans_date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="paid_amount" class="form-label">Paid_amount</label>
                    <input type="text" value="{{ old('paid_amount') }}" name="paid_amount" class="form-control">
                    <span class="text-danger">
                        @error('paid_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">

                <div class="col mb-3">
                    <label for="remain_amount" class="form-label">Remain_amount</label>
                    <input type="remain_amount" value="{{ old('remain_amount') }}" name="remain_amount"
                        class="form-control" id="title">
                    <span class="text-danger">
                        @error('remain_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="new_emi_amount" class="form-label">New_emi_amount</label>
                    <input type="new_emi_amount" value="{{ old('new_emi_amount') }}" name="new_emi_amount"
                        class="form-control" id="title">
                    <span class="text-danger">
                        @error('new_emi_amount')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">

                <div class="col mb-3">
                    <label for="installment_no" class="form-label">Installment_no</label>
                    <input type="installment_no" value="{{ old('installment_no') }}" name="installment_no"
                        class="form-control" id="title">
                    <span class="text-danger">
                        @error('installment_no')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="status" class="form-label">Select status</label>
                    <select name="status" class="form-select" id="status">
                        <option value="Complete">Complete</option>
                        <option value="Pending">Pending</option>
                        <option value="Hold">Hold</option>
                    </select>
                    <span class="text-danger">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="remarks" class="form-label">remarks</label>
                    <input type="text" id="remarks" value="{{ old('remarks') }}" name="remarks" class="form-control">
                    <span class="text-danger">
                        @error('remarks')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


            </div>

            <div class="col  mt-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
