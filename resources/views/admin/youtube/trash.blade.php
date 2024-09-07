@extends('layouts.app')

@section('content')
    <div class="container border p-0 mt-0 mb-5">
        @if ($message = Session::get('youtubeurlsuccess'))
            <div class="alert alert-success  my-2" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-4">
                <h2 class="text-white">
                    @if (count($youtube) > 0)
                        TRASH DATA OF YOUTUBE SLIDER URL
                    @else
                        There are no Youtube slider URL
                    @endif
                </h2>
            </div>
            <div class="col-lg-8 d-flex justify-content-end align-items-center">
                <span>
                    <a href="{{ route('topbar.index') }}" class="btn" style="background-color: #e3f2fd"><b>Back</b></a>
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
                            <a onclick="return confirm('do you want to restore it')"
                                class="btn btn-primary shadow-none shadow-none"
                                href="{{ route('youtube.restore', $item->id) }}">Restore</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger  shadow-none"
                                href="{{ route('youtube.destroy', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
