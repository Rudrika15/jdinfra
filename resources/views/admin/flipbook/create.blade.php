@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">ADD NEW FLIPBOOK IN {{ $projects->title }}</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('flipbook.index', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">

            <form action="{{ route('flipbook.store', request()->route('projectid')) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="projectid" value={{ request()->route('projectid') }} />
                <div class="mb-3">
                    <label for="imageurl" class="form-label">Image URL</label>
                    <input type="file" name="imageurl" class="form-control" id="imageurl">
                    <span class="text-danger">
                        @error('imageurl')
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
