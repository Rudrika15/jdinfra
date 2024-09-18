@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">ADD NEW COMPANY</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('company.index', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form method="POST" action="{{ route('company.store', request()->route('projectid')) }}"
                enctype="multipart/form-data">
                @csrf
                <!-- Other form fields -->
                <input type="hidden" name="projectid" value={{ request()->route('projectid') }} />
                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name :</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}"
                        id="company_name">
                    <span class="text-danger">
                        @error('company_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control" id="logo">
                    <span class="text-danger">
                        @error('logo')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="my-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" min="1" value="{{ old('mobile') }}" name="mobile" class="form-control"
                        id="mobile">
                    <span class="text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="address" class="my-3">Address</label>
                    <input type="text" value="{{ old('address') }}" name="address" class="form-control" id="address">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="text-center mt-5">
                    <button class="btn btn-primary shadow-none" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection
