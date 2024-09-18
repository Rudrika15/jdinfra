@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-8">
                <h4 class="text-white">UPDATE &nbsp;-&nbsp; PROJECT GALLERY OF {{ $galleries->project->title }} UPDATE</h4>
            </div>
            <div class="col-lg-4 d-flex justify-content-end align-items-center">
                <span style="float:right"><button style="float:right;background-color: #e3f2fd" onclick="history.back()"
                        class="btn">Back</button></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('progallery.update', $galleries->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title"
                        value="{{ $galleries->title }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="gallery_type" class="form-label">Gallery</label>
                    <input type="text" name="gallery_type" class="form-control" id="gallery_type"
                        value="{{ $galleries->gallery_type }}">
                    <span class="text-danger">
                        @error('gallery_type')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    @if ('{{ $galleries->imageurl }}')
                        <img width="100" src="{{ url('/') }}/gallery-images/{{ $galleries->imageurl }}"><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="imageurl" value="{{ $galleries->imageurl }}" />
                    <span class="text-danger">
                        @error('imageurl')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
