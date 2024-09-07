@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">
                    @if (count($flipbooks) > 0)
                        FLIPBOOK OF {{ $flipbooks[0]->project->title }}
                    @else
                        There is no flipbooks
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                @if (Auth::user()->usertype == 'admin')
                    <span style="float:right; "><a href="{{ route('flipbook.create', request()->route('projectid')) }}"
                            class="btn me-2" style="background-color: #e3f2fd">Add New</a>
                            <a href="{{ route('flipbook.trash', request()->route('projectid')) }}"
                                class="btn me-2" style="background-color: #e3f2fd">Go To Trash</a>
                            </span>
                @endif
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('project.show', request()->route('projectid')) }}" class="btn ms-1"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>

        <div class="container-fluid p-5">
            <div class="row col-12">
                @foreach ($flipbooks as $item)
                    <div class="col-3 my-3">
                        <div class="card">
                            <a class="p-4 text-decoration-none"
                                href="{{ url('/') }}/flipbook-pdf/{{ $item->imageurl }}" target="_blank">View
                                Flipbook</a>
                            @if (Auth::user()->usertype == 'admin')
                                <div class="card-body">
                                    <a class="btn btn-primary shadow-none"
                                        href="{{ route('flipbook.edit', $item->id) }}">Edit</a>
                                    <a onclick="return confirm('do you want to delete it?')"
                                        class="btn btn-danger shadow-none"
                                        href="{{ route('flipbook.delete', $item->id) }}">Delete</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
