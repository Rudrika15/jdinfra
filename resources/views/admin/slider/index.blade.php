@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="py-3">
                <span>Slider</span>
                <span style="float:right"><a href="{{ route('slider.create') }}" class="btn btn-primary">Add New
                        Slider</a></span>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Subtitle</th>
                {{-- <th>Navigation</th> --}}
                <th>ImageURL</th>
                <th>Order</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($sliders as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->subtitle }}</td>
                    {{-- <td>{{ $item->navigation }}</td> --}}
                    <td><img src="{{ url('/') }}/slider-images/{{ $item->imageurl }}" width="100px"></td>
                    <td>{{ $item->order }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('slider.edit', $item->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('slider.delete', $item->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
