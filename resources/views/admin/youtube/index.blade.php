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
                <span>Youtube slider URL</span>
                <span style="float:right"><a href="{{ route('youtube.create') }}" class="btn btn-primary">Add New</a></span>
            </div>
            <table class="table table-bordered text-center">
                <tr>
                    <th>Id</th>
                    <th>Youtube</th>
                    <th>Action</th>

                </tr>
                @foreach ($youtube as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->youtubeurl }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('youtube.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger" href="{{ route('youtube.delete', $item->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection
