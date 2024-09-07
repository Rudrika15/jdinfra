@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">UPDATE &nbsp;-&nbsp; AMENITIES OF {{ $aminitie->project->title }} </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('aminiti.index', $aminitie->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('aminiti.update', $aminitie->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $aminitie->title }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group mb-2">
                    @if ('{{ $aminitie->icon }}')
                        <img width="100" src="{{ url('/') }}/aminitie-icon/{{ $aminitie->icon }}"><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="icon" value="{{ $aminitie->icon }}" />
                    <span class="text-danger">
                        @error('icon')
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
