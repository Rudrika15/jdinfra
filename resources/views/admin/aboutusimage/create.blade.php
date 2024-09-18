@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-3">
            <h4 class="text-center">Add Aboutusimage Image</h4>
            <span style="float:right; margin-right: 1%"><a href="{{ route('topbar.index') }}"
                    class="btn btn-primary">Back</a></span>
        </div>
        <div class="container border border-secondary p-5 mt-5">
        <form action="{{ route('aboutusimage.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            {{--  <input type="hidden" name="projectid" value={{ request()->route('projectid') }} />  --}}
            <div class="mb-3">
                <label for="imageurl" class="form-label">Image URL</label>
                <input type="file" name="imageurl" class="form-control" id="imageurl">
                <span class="text-danger">
                    @error('imageurl')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
@endsection
