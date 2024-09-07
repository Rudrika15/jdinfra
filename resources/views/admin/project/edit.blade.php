@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">{{ $projects->title }} UPDATE</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('project.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('project.update', $projects->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $projects->title }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location URL</label>
                    <input type="text" name="location" class="form-control" id="location"
                        value="{{ $projects->location }}">
                    <span class="text-danger">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description"
                        value="{{ $projects->description }}">
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="brochure" class="form-label">Brochure</label><br>

                    @if ($projects->brochure && filter_var($projects->brochure, FILTER_VALIDATE_URL) === false)
                        <a href="{{ url('brochure-images/' . $projects->brochure) }}" target="_blank"> View Brochure </a>
                        <br>
                    @else
                        <p>No Pdf found</p>
                    @endif
                    <input class="mt-2" type="file" name="brochure" />
                    <span class="text-danger">
                        @error('brochure')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="map" class="form-label">Map URL</label>
                    <input type="text" name="map" class="form-control" id="map" value="{{ $projects->map }}">
                    <span class="text-danger">
                        @error('map')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label><br>
                    @if ($projects->logo && filter_var($projects->logo, FILTER_VALIDATE_URL) === false)
                        <img width="100" src="{{ url('/') }}/project-logo/{{ $projects->logo }}"><br><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="logo" value="{{ $projects->imageurl }}" />
                    <span class="text-danger">
                        @error('logo')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="imageurl" class="form-label">Image URL</label><br>
                    @if ($projects->imageurl && filter_var($projects->imageurl, FILTER_VALIDATE_URL) === false)
                        <img width="100" src="{{ url('/') }}/project-images/{{ $projects->imageurl }}"><br><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="imageurl" value="{{ $projects->imageurl }}" />
                    <span class="text-danger">
                        @error('imageurl')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea class="summernote form-control" name="about" id="editors" rows="3">{{ $projects->about }}</textarea>
                    <span class="text-danger">
                        @error('about')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                </div>
            </form>
        </div>
    </div>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}
@endsection
