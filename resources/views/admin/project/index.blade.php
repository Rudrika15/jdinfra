@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-9">
                <h2>Project</h2>
            </div>
            <div class="col-lg-3">
                @if (Auth::user()->usertype == 'admin')
                    <span>
                        <a href="{{ route('project.create') }}" class="btn btn-primary shadow-none ">Add
                            new</a>
                        <a href="{{ route('project.trash') }}" class="btn btn-primary shadow-none">Go To Trash </a></span>
                @endif
            </div>
        </div>
        {{--  <div class="row">  --}}
        <div class="row">
            @foreach ($projects as $item)
                <div class="col-4 pb-5 wow fadeInUp border-none" data-wow-delay="0.1s">
                    <div class="card shadow" style="width: 20rem; min-height:480px; ">
                        <img src="{{ url('/') }}/project-images/{{ $item->imageurl }}" class="card-img-top"
                            alt="..." style="width: 100%">
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->title }}</h6>
                            <span class="location d-inline-block mb-3"><i
                                    class="bi bi-geo-alt-fill"></i>{{ $item->location }}</span>
                            <div class="align-self-end " style="position: absolute; bottom:15px;">
                                <a class="btn btn-warning shadow-none"
                                    href="{{ route('project.show', $item->id) }}">Show</a>
                                @if (Auth::user()->usertype == 'admin')
                                    <a class="btn btn-primary shadow-none"
                                        href="{{ route('project.edit', $item->id) }}">Edit</a>
                                    <a onclick="return confirm('do you want to delete it?')"
                                        class="btn btn-danger "shadow-none
                                        href="{{ route('project.delete', $item->id) }}">Delete</a>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endsection
