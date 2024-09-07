@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                @if (count($bookings) > 0)
                    <h2 class="text-white"> AGENT BOOKINGS </h2>
                @else
                    <h2 class="text-white text-uppercase">There is no bookings</h2>
                @endif
            </div>
        </div>
        @if (count($bookings) !== 0)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Agent Code</th>
                        <th>Agent Name</th>
                        <th>Sector Name</th>
                        <th>Plot No</th>
                        <th>Plot Size</th>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Agent Commission</th>
                        @if (Auth::user()->usertype == 'admin')
                            <th>action</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bookings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->agentcode }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>Sector {{ $item->plot->sector->sectorname }}</td>
                            <td>Plot {{ $item->plot->plotnumber }}</td>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->fullname }}</td>
                            <form action="{{ route('admin.user.commissionupdate', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <td>
                                    <select name="agent_commisson" class="form-select" id="">
                                        @for ($i = 1; $i <= 25; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                </td>


                                <td>

                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>


                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
