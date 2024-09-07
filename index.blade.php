@extends('layouts.app')
@section('content')
    <div class="container-fluid p-3">
        @if ($message = Session::get('Success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="py-3 ">
            <h2 class="text-center">View Installment</h2>
            <form id="filter-form" action="{{ route('installment.index') }}" method="GET">
                <div class="row d-flex flex-row-reverse ">
                    <div class="col-lg-1 ">
                        <select name="status" id="status" style="float:right;width:130px"
                            onchange="document.getElementById('filter-form').submit()" class="form-select shadow-none">
                            {{-- <option value="" disabled {{ request('status') == '' ? 'selected' : '' }} selected>select
                            value
                        </option> --}}
                            <option value="" {{ request('status') == '' ? 'selected' : '' }}> All</option>
                            <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                            <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    {{--  <th>Booking</th>  --}}
                    <th>Project Name</th>
                    <th>Sector Name</th>
                    <th>Plot Number</th>
                    <th>Full Name</th>
                    <th>Agent Name</th>
                    <th>Transection_date</th>
                    <th>Paid_amount</th>
                    <th>Remain_amount</th>
                    <th>New_emi_amount</th>
                    <th>EMI No</th>
                    <th>Installment_no</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($installments as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{--  <td>{{ $item->booking_id }}</td>  --}}
                    <td>{{ $item->booking->plot->sector->project->title }}</td>
                    <td>Sector {{ $item->booking->plot->sector->sectorname }}</td>
                    <td>Plot {{ $item->booking->plot->plotnumber }}</td>
                    <td>{{ $item->booking->fullname }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->trans_date }}</td>
                    <td>{{ $item->paid_amount }}</td>
                    <td>{{ $item->remain_amount }}</td>
                    <td>{{ $item->new_emi_amount }}</td>
                    <td>{{ $item->emi }}</td>
                    <td>{{ $item->installment_no }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->remarks }}</td>

                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <div>
                                <a href="{{route('installment.edit', $item->id)}}" class="btn btn-success">Paid</a>
                            </div>
                            <div>
                                <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger"
                                href="{{ route('installment.delete', $item->id) }}">Delete</a>                                            
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
