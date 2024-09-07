@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-7">
                <h2 class="text-white">
                    @if (count($progallerys) > 0)
                        PROJECT GALLERY OF {{ $progallerys[0]->project->title }}
                    @else
                        There is no gallery image
                    @endif
                </h2>
            </div>
            <div class="col-lg-5 d-flex justify-content-end align-items-center">
                @if (Auth::user()->usertype == 'admin')
                    <span style="float:right"><a href="{{ route('progallery.create', request()->route('projectid')) }}"
                            class="btn me-2" style="background-color: #e3f2fd">Add New</a>
                        <a href="{{ route('progallery.trash', request()->route('projectid')) }}" class="btn me-2"
                            style="background-color: #e3f2fd">Go To Trash</a>
                    </span>
                @endif
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>

        <div class="container-fluid p-5">
            <div class="row col-12">
                @foreach ($progallerys as $item)
                    <div class="col-4 my-4">
                        {{-- <input type="text" value="{{$item->projectid}}" name="" id=""> --}}
                        <div class="card" style="width:18rem; min-height:300px;">
                            <h2 class="list-group-item mb-0 "
                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis"
                                title="{{ $item->title }}">
                                {{ $item->title }}</h2>
                            <img style="width:100%; height:18rem;"
                                src="{{ url('/') }}/gallery-images/{{ $item->imageurl }}" class="card-img-top"
                                alt="...">
                            @if (Auth::user()->usertype == 'admin')
                                <div class="card-body">
                                    <a class="btn btn-primary shadow-none"
                                        href="{{ route('progallery.edit', $item->id) }}">Edit</a>
                                    <a onclick="return confirm('do you want to delete it?')"
                                        class="btn btn-danger shadow-none" shadow-none
                                        href="{{ route('progallery.delete', $item->id) }}">Delete</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
