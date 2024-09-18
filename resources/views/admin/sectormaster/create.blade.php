@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">ADD NEW SECTOR IN {{ $projects->title }}</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('sector.index', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('sector.store') }}" method="post">
                @csrf

                <input type="hidden" name="projectid" value={{ request()->route('projectid') }} />

                <div class="mb-3">
                    <label for="sectorname" class="form-label">SectorName</label>
                    <input type="text" name="sectorname" class="form-control" id="sectorname"
                        value="{{ old('sectorname') }}">
                    <span class="text-danger">
                        @error('sectorname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
