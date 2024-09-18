@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">ADD NEW SLIDER</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('topbar.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="" class="form-label">Sub title</label>
                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ old('subtitle') }}">
                    <span class="text-danger">
                        @error('subtitle')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="selectproject" class="form-label">Select Project</label>
                    <select class="form-select" name="navigation" id="navigation">
                        <option value="HOME">HOME</option>
                        @foreach ($projects as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    {{--  <input type="text" name="navigation" class="form-control" id="navigation" value="{{old('navigation')}}">  --}}
                    <span class="text-danger">
                        @error('navigation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image URL</label>
                    <input type="file" name="imageurl" class="form-control" id="imageurl">
                    <span class="text-danger">
                        @error('imageurl')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="text" name="order" class="form-control" id="imageurl" value="{{ old('order') }}">
                    <span class="text-danger">
                        @error('order')
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
