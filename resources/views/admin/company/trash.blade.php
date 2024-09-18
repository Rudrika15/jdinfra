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
                <h4 class="text-white">
                    @if (count($companys) > 0)
                       TRASH DATA OF COMPANY
                    @else
                        There is no company trash data
                    @endif
                </h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right;"><a href="{{ route('company.index', request()->route('projectid')) }}"
                        class="btn me-2" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        @if (count($companys) !== 0)
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Logo</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($companys as $item)
                <tr>
                    <td>{{ $item->company_name }}</td>
                    <td> <img src="{{ url('/') }}/company-logo/{{ $item->logo }}" alt="..." style="width: 10%;">
                    </td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->address }}</td>
                    <td class="d-flex gap-2"><a onclick="return confirm('do you want to restore it')" class="btn btn-primary shadow-none"
                            href="{{ route('company.restore', $item->id) }}">Restore</a>
                        <a href="{{ route('company.destroy', $item->id) }}"
                            onclick="return confirm('Do You Want to permanently delete it')" class="btn btn-danger shadow-none">
                            Delete</a>
                    </td>

                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    </div>
@endsection
