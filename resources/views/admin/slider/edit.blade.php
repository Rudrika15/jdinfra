@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white"> UPDATE &nbsp;-&nbsp; SLIDER</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right" ><a href="{{ route('topbar.index') }}"
                    class="btn" style="background-color: #e3f2fd" >Back</a></span>
            </div>
        </div>
        <div class="container p-5">
            <form action="{{ route('slider.update', $sliders->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $sliders->title }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sub title</label>
                    <input type="text" name="subtitle" class="form-control" id="subtitle"
                        value="{{ $sliders->subtitle }}">
                        <span class="text-danger">
                            @error('subtitle')
                                {{ $message }}
                            @enderror
                        </span>
                </div>
                <div class="mb-3">
                    <label for="selectproject" class="form-label">Select Project</label>
                    <select class="form-select" name="navigation" id="navigation">

                        @foreach ($projects as $item)
                            <option value="{{ $item->id }}" {{ $sliders->navigation == $item->id ? 'selected' : '' }}>
                                {{ $item->title }}
                            </option>
                        @endforeach

                        <option value="HOME" {{ $sliders->navigation == 'HOME' ? 'selected' : '' }}>HOME</option>

                    </select>

                    <span class="text-danger">
                        @error('navigation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    @if ('{{ $sliders->imageurl }}')
                        <img width="100" src="{{ url('/') }}/slider-images/{{ $sliders->imageurl }}"><br>
                    @else
                        <p>No image found</p>
                    @endif
                    <input class="mt-2" type="file" name="imageurl" value="{{ $sliders->imageurl }}" />
                    <span class="text-danger">
                        @error('imageurl')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="text" name="order" class="form-control" id="order" value="{{ $sliders->order }}">
                    <span class="text-danger">
                        @error('order')
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
