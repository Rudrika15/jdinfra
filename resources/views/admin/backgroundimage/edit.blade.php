@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">UPDATE &nbsp;-&nbsp; BACKGROUND IMAGE </h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('topbar.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('backgroundimage.update', $images->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group  mb-3">
                    @if ('{{ $images->imageurl }}')
                        <img width="100" src="{{ url('/') }}/background-images/{{ $images->imageurl }}"><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="imageurl" value="{{ $images->imageurl }}" />
                    <span class="text-danger  mb-3">
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
