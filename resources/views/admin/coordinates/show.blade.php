@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-5 m-0">
        <div class="row mb-3 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">All Coordinates</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%">
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('coordinate.trash', request()->route('projectid')) }}" class="btn"
                            style="background-color: #e3f2fd">Go To Trash</a>
                    @endif
                </span>
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('layout.index', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        {{--  <h1>All Coordinates</h1>  --}}
        {{--  <a href="{{route('coordinate.trash')}}" class="btn btn-primary">Go To Trash</a>  --}}
        @if ($coordinates->isEmpty())
            <h2 class="text-center m-5">No coordinates found.</h2>
        @else
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sector Name</th>
                        <th>Plot ID</th>
                        <th>X1</th>
                        <th>Y1</th>
                        <th>X2</th>
                        <th>Y2</th>
                        <th>X3</th>
                        <th>Y3</th>
                        <th>X4</th>
                        <th>Y4</th>
                        <th>action</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coordinates as $coordinate)
                        <tr>
                            <td>{{ $coordinate->id }}</td>
                            <td>{{ $coordinate->sector_name }}</td>
                            <td>{{ $coordinate->plot_id }}</td>
                            <td>{{ $coordinate->x1 }}</td>
                            <td>{{ $coordinate->y1 }}</td>
                            <td>{{ $coordinate->x2 }}</td>
                            <td>{{ $coordinate->y2 }}</td>
                            <td>{{ $coordinate->x3 }}</td>
                            <td>{{ $coordinate->y3 }}</td>
                            <td>{{ $coordinate->x4 }}</td>
                            <td>{{ $coordinate->y4 }}</td>
                            <td>
                                <a href="{{ route('coordinate.edit', $coordinate->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('coordinate.delete', $coordinate->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Do You Want To Delete It ?')">Delete</a>
                            </td>
                            <!-- Add more cells for additional fields -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable(); // Initialize DataTable
        });
    </script>

    {{--  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>  --}}
    {{--  <script src=" https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>  --}}
@endsection
