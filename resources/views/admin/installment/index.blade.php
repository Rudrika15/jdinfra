@extends('layouts.app')
@section('content')
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <form id="filter-form" action="{{ route('installment.index', request()->route('projectid')) }}" method="GET">
            <div class="row m-0 p-3 d-flex flex-row-reverse" style="background-color: #0b6ab2">
                <div class="col-lg-2 d-flex justify-content-end align-items-center">
                    <span>
                        @if (Auth::user()->usertype == 'admin')
                            <a href="{{ route('installment.trashdata', request()->route('projectid')) }}" class="btn"
                                style="background-color: #e3f2fd">Go To Trash</a>
                        @endif
                        <a href="{{ route('project.show', request()->route('projectid')) }}" class="btn me-2"
                            style="background-color: #e3f2fd">Back</a>
                    </span>
                </div>
                <div class="col-lg-1 d-flex justify-content-end align-items-center">
                    <div style="float:right; width:129px;">
                        <button class="btn shadow-none dropdown-toggle" style="background-color: #e3f2fd" type="button"
                            id="statusDropdown" name="status" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ request('status') ? ucwords(request('status')) : 'Unpaid' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ route('installment.index', ['projectid' => request()->route('projectid'), 'status' => 'All']) }}">All</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('installment.index', ['projectid' => request()->route('projectid'), 'status' => 'Unpaid']) }}">Unpaid</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('installment.index', ['projectid' => request()->route('projectid'), 'status' => 'Paid']) }}">Paid</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('installment.index', ['projectid' => request()->route('projectid'), 'status' => 'Completed']) }}">Completed</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h2 class="text-white">
                        @if (count($installments) > 0)
                            INSTALLMENTS OF {{ $installments[0]->booking->plot->sector->project->title }}
                        @else
                            There are no installments
                        @endif
                    </h2>
                </div>
            </div>
        </form>

        @if (count($installments) !== 0)
            <table class="table table-bordered  text-center">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sector Name</th>
                        <th>Plot Number</th>
                        <th>Client Name</th>
                        @if (Auth::user()->usertype == 'agent')
                            <th>Agent Name</th>
                        @endif

                        <th>Next Transection date</th>
                        <th>Total Amount</th>
                        <th>Booking Amount</th>
                        <th>Total Paid Amount</th>
                        <th>Remain Amount</th>
                        <th>New emi Amount</th>
                        <th>Remaining Emi</th>
                        <th>Paid Emi</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        @foreach ($installments as $item)
                    <tr class="text-nowrap">
                        <td>{{ $loop->iteration }}</td>
                        <td>Sector {{ $item->booking->plot->sector->sectorname }}</td>
                        <td>Plot {{ $item->booking->plot->plotnumber }}</td>
                        <td>{{ $item->booking->fullname }}</td>
                        @if (Auth::user()->usertype == 'agent')
                            <td>{{ $item->user->name }}</td>
                        @endif
                        <td>{{ $item->trans_date }}</td>
                        <td>{{ $item->booking->sell_amount }}</td>
                        <td>{{ $item->booking->booking_amount }}</td>
                        <td>{{ $item->paid_amount + $item->booking->booking_amount }}</td>
                        <td>{{ $item->remain_amount }}</td>
                        <td>{{ $item->new_emi_amount }}</td>
                        <td>{{ $item->emi }}</td>
                        @if ($item->status == 'Paid')
                            <td>{{ $item->installment_no }}</td>
                        @else
                            <td>{{ $item->installment_no + 1 }}</td>
                        @endif
                        <td>{{ $item->status }}</td>

                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                @if ($item->status == 'Unpaid')
                                    <div>
                                        <a href="{{ route('installment.edit', $item->id) }}"
                                            class="btn btn-success shadow-none btn-sm text-nowrap">Pay Now</a>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('installment.viewmore', $item->booking->id) }}"
                                        class="btn btn-warning shadow-none btn-sm text-nowrap">View More</a>
                                </div>
                                @if (Auth::user()->usertype == 'admin')
                                    <div>
                                        <a onclick="return confirm('do you want to delete it?')"
                                            class="btn btn-danger shadow-none btn-sm"
                                            href="{{ route('installment.delete', $item->id) }}">Delete</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
        @endforeach
        </tr>
        </tbody>

        </table>
        @endif
    </div>
@endsection
