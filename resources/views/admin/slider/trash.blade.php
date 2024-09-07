@extends('layouts.app')

@section('content')
    <div class="container border p-0 mt-0 mb-5">
        @if ($message = Session::get('Slidersuccess'))
            <div class="alert alert-success my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">
                    @if (count($sliders) > 0)
                        TRASH DATA OF SLIDER
                    @else
                        There are no Slider
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('topbar.index') }}" class="btn"
                        style="background-color: #e3f2fd"><b>Back</b></a></span>
            </div>
        </div>
        @if (count($sliders) !== 0)
            <table class="table table-bordered mb-0  text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Project slider</th>
                    <th>ImageURL</th>
                    <th>Order</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($sliders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subtitle }}</td>
                        <td>
                            @if ($item->project)
                                {{ $item->project->title }}
                            @else
                                HOME
                            @endif
                        </td>
                        <td><img src="{{ url('/') }}/slider-images/{{ $item->imageurl }}" width="100px"></td>
                        <td>{{ $item->order }}</td>
                        <td>
                            <a onclick="return confirm('do you want to restore it')" class="btn btn-primary shadow-none"
                                href="{{ route('slider.restore', $item->id) }}">Restore</a>
                            <a onclick="return confirm('do you want to permanently delete it?')"
                                class="btn btn-danger shadow-none"
                                href="{{ route('slider.destroy', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
