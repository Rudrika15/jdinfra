@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-8">
                <h4 class="text-white">ADD NEW PROJECT GALLERY IN {{ $projects->title }}</h4>
            </div>
            <div class="col-lg-4 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('progallery.index', request()->route('projectid')) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('progallery.store', request()->route('projectid')) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="projectid" value={{ request()->route('projectid') }} />
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3 col-3">
                    <label for="gallery_type" class="form-label">Gallery</label>
                    <select name="gallery_type" class="form-select">
                        <option value="about_project">About_project</option>
                        <option value="features">Features</option>
                        <option value="location">Location</option>
                        <option value="plot_plan">Plot_plan</option>
                        <option value="gallery">Gallery</option>
                        <option value="price_list">Price_list</option>
                        <option value="location_map">Location_map</option>
                        <option value="download">Download</option>
                    </select>
                    <span class="text-danger">
                        @error('gallery_type')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
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
