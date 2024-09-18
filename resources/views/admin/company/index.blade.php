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
                        COMPANY DETAILES
                    @else
                        There is no company data
                    @endif
                </h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right;"><a href="{{ route('company.create', request()->route('projectid')) }}"
                        class="btn me-2" style="background-color: #e3f2fd">Add
                        New Company Details</a>
                        <a href="{{ route('company.trash', request()->route('projectid')) }}"
                            class="btn me-2" style="background-color: #e3f2fd">Go To Trash</a>
                        </span>
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
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
                    <td class="d-flex gap-2"><a class="btn btn-primary shadow-none"
                            href="{{ route('company.edit', $item->id) }}">Edit</a>
                        <a href="{{ route('company.delete', $item->id) }}"
                            onclick="return confirm('Do You Want to delete it')" class="btn btn-danger shadow-none">
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
