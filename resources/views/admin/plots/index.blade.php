@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" id="successMessage">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="py-3">

                <span>Plot master</span>
                <span style="float:right"><a href="{{ route('plot.create', request()->route('sectormasterid')) }}"
                        class="btn btn-outline-primary">sssAdd New
                        Plot</a></span>

            </div>
            <table class="table table-bordered text-center">
                <tr>
                    <th>Sector Id</th>
                    <th>Plot Number</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($plots as $item)
                    <tr>
                        <td>{{ $item->sector->sectorname }}</td>
                        <td>{{ $item->plotnumber }}</td>
                        <td>{{ $item->area }}</td>
                        <td> <span
                                class="{{ $item->status == 'Sold' ? 'btn btn-outline-success' : ($item->status == 'Hold' ? 'btn btn-outline-danger' : 'btn btn-outline-info') }}">
                                {{ $item->status }} </span> </td>

                        {{--  @foreach ($projects as $project)
                        <td>{{ $sector->sectorname }}</td>
                        @endforeach  --}}
                        <td>

                            <a class="btn btn-outline-primary" href="{{ route('plot.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-outline-danger"
                                href="{{ route('plot.delete', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection
