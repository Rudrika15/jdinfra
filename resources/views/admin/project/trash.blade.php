@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-10">
                <h2 class="text-white">
                    @if (count($projects) > 0)
                        Trash Projects
                    @else
                        There is no trash data
                    @endif
                </h2>
            </div>
            <div class="col-lg-2 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('project.index') }}" style="background-color: #e3f2fd"
                        class="btn">Back</a></span>
            </div>
        </div>

        {{--  <div class="row">  --}}
        <div class="row">
            @foreach ($projects as $item)
                <div class="col-4 mt-5 pb-5 wow fadeInUp border-none" data-wow-delay="0.1s">
                    <div class="card shadow" style="width: 20rem; min-height:480px; ">
                        <img src="{{ url('/') }}/project-images/{{ $item->imageurl }}" class="card-img-top"
                            alt="..." style="width: 100%;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->title }}</h6>
                            <span class="location d-inline-block mb-3"><i
                                    class="bi bi-geo-alt-fill"></i>{{ $item->location }}</span>
                            <div class="align-self-end " style="position: absolute; bottom:15px;">
                                {{--  <a class="btn btn-warning shadow-none"
                                    href="{{ route('project.show', $item->id) }}">Show</a>  --}}
                                @if (Auth::user()->usertype == 'admin')
                                    <a onclick="return confirm('do you want to restore it')"
                                        class="btn btn-primary shadow-none"
                                        href="{{ route('project.restore', $item->id) }}">Restore</a>
                                    <a onclick="return confirm('do you want to permanently delete it?')"
                                        class="btn btn-danger "shadow-none
                                        href="{{ route('project.destroy', $item->id) }}">Delete</a>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endsection
