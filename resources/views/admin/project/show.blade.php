@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row border p-5">
            <div class="col-lg-6">
                @foreach ($projects as $item)
                    <h3>{{ $item->title }}</h3>
                @endforeach
            </div>
            <div class="col-lg-6">
                <span style="float:right;">
                    <a class="btn btn-primary shadow-none" href="{{ route('project.index') }}">Back</a>
                </span>
            </div>
            @foreach ($projects as $item)
                <div class="col mt-3">
                    <img style="width: 50%" src="{{ url('/') }}/project-images/{{ $item->imageurl }}"><br>
                </div>
            @endforeach

            <div class="col-sm-3 mt-3">

                <div class="list-group">
                    <a href="{{ route('sector.index', request()->route('project')) }}"
                        class="list-group-item list-group-item-action" aria-current="true">
                        Sectors </a>
                    <a href="{{ route('plot.index', request()->route('project')) }}"
                        class="list-group-item list-group-item-action">
                        Plot </a>
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('progallery.index', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Gallery </a>
                        <a href="{{ route('aminiti.index', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Amenities </a>
                        <a href="{{ route('flipbook.index', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Flipbook </a>
                        <a href="{{ route('agentcommission', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Agent Payment </a>
                    @endif
                    <a href="{{ route('admin.booking.viewbooking', request()->route('project')) }}"
                        class="list-group-item list-group-item-action">
                        Booking </a>
                    <a href="{{ route('installment.index', request()->route('project')) }}"
                        class="list-group-item list-group-item-action">
                        Installment</a>
                    <a href="{{ route('layout.index', request()->route('project')) }}"
                        class="list-group-item list-group-item-action">
                        Layout Plan</a>
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('editor.index', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Booking Form Editors</a>
                        <a href="{{ route('company.index', request()->route('project')) }}"
                            class="list-group-item list-group-item-action">
                            Company Details</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
