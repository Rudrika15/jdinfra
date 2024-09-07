@extends('layouts.app')

@section('content')
    {{--  Topbar   --}}
    <div class="container  border p-0 mt-0 mb-5">
        @if ($message = Session::get('Topbarsuccess'))
            <div class="alert alert-success my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h3 class="p-3 text-white mb-0" style="background-color: #0b6ab2">
            @if (count($topbars) > 0)
                Topbar details
            @else
                There are no Topbar details
            @endif
        </h3>
        @if (count($topbars) !== 0)
            <table class="table table-bordered table-responsive  mb-0   ">
                @foreach ($topbars as $item)
                    <tr>
                        <th>Contact 1</th>
                        <td>{{ $item->contact1 }}</td>
                    </tr>
                    <tr>
                        <th>Contact 2</th>
                        <td>{{ $item->contact2 }}</td>
                    </tr>
                    <tr>
                        <th>Contact 3</th>
                        <td>{{ $item->contact3 }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>{{ $item->social_logo1 }}</td>
                    </tr>
                    <tr>
                        <th>Youtube</th>
                        <td>{{ $item->social_logo2 }}</td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td>{{ $item->social_logo3 }}</td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <a class="btn btn-primary shadow-none shadow-none"
                                href="{{ route('topbar.edit', $item->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>


    {{--  Slider  --}}
    <div class="container border p-0 mt-0 mb-5">
        @if ($message = Session::get('Slidersuccess'))
            <div class="alert alert-success my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-1">
                <h3 class="text-white">
                    @if (count($sliders) > 0)
                        SLIDER
                    @else
                        There are no slider data
                    @endif
                </h3>
            </div>
            <div class="col-lg-11 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('slider.create') }}" class="btn" style="background-color: #e3f2fd"><b>Add New
                            Slider</b></a>
                    <a href="{{ route('slider.trash') }}" class="btn" style="background-color: #e3f2fd"><b>Go To
                            Trash</b></a>
                </span>
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
                            {{--  {{@dd($item->project)}}  --}}
                            {{--  {{ var_dump($item->project) }}  --}}
                            @if ($item->project)
                                {{ $item->project->title }}
                            @else
                                HOME
                            @endif
                        </td>
                        <td><img src="{{ url('/') }}/slider-images/{{ $item->imageurl }}" width="100px"></td>
                        <td>{{ $item->order }}</td>
                        <td>
                            <a class="btn btn-primary shadow-none" href="{{ route('slider.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger shadow-none"
                                href="{{ route('slider.delete', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>


    {{--  Youtube slider  --}}
    <div class="container border p-0 mt-0 mb-5">
        @if ($message = Session::get('youtubeurlsuccess'))
            <div class="alert alert-success  my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-4">
                <h3 class="text-white">
                    @if (count($youtube) > 0)
                        YOUTUBE SLIDER URL
                    @else
                        There are no YOUTUBE SLIDER URL
                    @endif
                </h3>
            </div>
            <div class="col-lg-8 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('youtube.create') }}"class="btn" style="background-color: #e3f2fd"><b>Add
                            New</b></a>
                    <a href="{{ route('youtube.trash') }}" class="btn" style="background-color: #e3f2fd"><b>Go To
                            Trash</b></a>
                </span>
            </div>
        </div>
        @if (count($youtube) !== 0)
            <table class="table table-bordered mb-0  text-center">
                <tr>
                    <th>Id</th>
                    <th>Youtube</th>
                    <th>Action</th>

                </tr>
                @foreach ($youtube as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->youtubeurl }}</td>
                        <td>
                            <a class="btn btn-primary shadow-none shadow-none"
                                href="{{ route('youtube.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger  shadow-none"
                                href="{{ route('youtube.delete', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>

    {{--  Background Image  --}}
    <div class="container border p-0 mt-0 mb-5">
        @if ($message = Session::get('Backgroundimagesuccess'))
            <div class="alert alert-success  my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <h3 class="text-white ">Background Image</h3>

        </div>
        <table class="table table-bordered mb-0  text-center">
            <tr>
                <th>Background Image</th>
                <th>Action</th>

            </tr>
            @foreach ($bgimages as $item)
                <tr>
                    <td><img class="img-fluid ps-3" style="width: 70%"
                            src="{{ url('/') }}/background-images/{{ $item->imageurl }}" alt="..."></td>
                    <td>
                        <a class="btn btn-primary shadow-none m-3"
                            href="{{ route('backgroundimage.edit', $item->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>


    </div>

    {{--  Aboutus image  --}}
    <div class="container border p-0 mt-0 mb-5  ">

        @if ($message = Session::get('Aboutusimagesuccess'))
            <div class="alert alert-success  my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <h3 class=" text-white ">Aboutus Image</h3>
        </div>
        <table class="table table-bordered mb-0  text-center">
            <tr>
                <th>Aboutus Image</th>
                <th>Action</th>

            </tr>
            @foreach ($images as $item)
                <tr>
                    <td> <img style="width: 20%" src="{{ url('/') }}/aboutus-images/{{ $item->imageurl }}"
                            class="img-fluid ps-3" alt="..."></td>
                    <td>
                        <a class="btn btn-primary shadow-none m-3"
                            href="{{ route('aboutusimage.edit', $item->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
