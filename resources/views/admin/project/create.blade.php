@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">ADD NEW PROJECT</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('project.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" id="location" value="{{ old('location') }}">
                    <span class="text-danger">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description"
                        value="{{ old('description') }}">
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="brochure" class="form-label">Brochure</label>
                    <input type="file" name="brochure" class="form-control" id="brochure" accept=".pdf">
                    <span class="text-danger">
                        @error('brochure')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="map" class="form-label">Map URL</label>
                    <input type="text" name="map" class="form-control" id="map" value="{{ old('map') }}">
                    <span class="text-danger">
                        @error('map')
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
                <div class="mb-3">
                    <label for="imageurl" class="form-label">Image URL</label>
                    <input type="file" name="imageurl" class="form-control" id="imageurl">
                    <span class="text-danger">
                        @error('imageurl')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control summernote" name="about" id="exampleFormControlTextarea4" rows="3">{{ old('about') }}</textarea>
                    <span class="text-danger">
                        @error('about')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
