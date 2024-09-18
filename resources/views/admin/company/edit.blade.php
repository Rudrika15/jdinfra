@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">EDIT COMPANY DETAILS</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('company.index', $company->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form method="POST" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Other form fields -->

                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name :</label>
                    <input type="text" name="company_name" class="form-control" value="{{ $company->company_name }}"
                        id="company_name">
                    <span class="text-danger">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label><br>
                    @if ($company->logo && filter_var($company->logo, FILTER_VALIDATE_URL) === false)
                        <img width="100" src="{{ url('/') }}/company-logo/{{ $company->logo }}"><br><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="logo" value="{{ $company->logo }}" />
                    <span class="text-danger">
                        @error('logo')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="my-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" value="{{ $company->mobile }}" name="mobile" class="form-control" id="mobile">
                    <span class="text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="address" class="my-3">Address</label>
                    <input type="text" value="{{ $company->address }}" name="address" class="form-control"
                        id="address">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-primary shadow-none" type="submit">Update</button>
                </div>
            </form>

        </div>
    </div>
@endsection
