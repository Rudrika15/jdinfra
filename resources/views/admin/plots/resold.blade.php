@extends('layouts.app')
@section('content')
    @if ($message = Session::get('Success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">

            <div class="col-lg-6">
                <h2 class="text-white">
                    @if (count($history) > 0)
                        RESOLD PLOTS
                    @else
                        There is no resold plots
                    @endif
                </h2>

            </div>
        </div>
        @if (count($history) !== 0)
            <table class="table table-bordered  text-center">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Booking ID</th>
                        <th>Project Name</th>
                        <th>Sector Name</th>
                        <th>Plot Number</th>
                        <th>Client Name</th>
                        <th>Agent Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        @foreach ($history as $item)
                    <tr class="text-nowrap">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->booking_id ?? '-' }}</td>
                        <td>{{ $item->plot->sector->project->title ?? '-' }}</td>
                        <td>{{ $item->plot->sector->sectorname ?? '-' }}</td>
                        <td> {{ $item->plotnumber ?? '-' }}</td>
                        <td>{{ $item->fullname ?? '-' }}</td>
                        <td>{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->plot->status ?? '-' }}</td>
                        <td> <a href="{{ route('plotdetails', $item->booking_id) }}"
                                class="btn btn-warning shadow-none btn-sm text-nowrap">View More</a></td>
                    </tr>
        @endforeach
        </tr>
        </tbody>

        </table>
        @endif
    </div>
@endsection
