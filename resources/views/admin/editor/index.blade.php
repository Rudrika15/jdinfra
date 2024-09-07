@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="successMessage">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">
                    @if (count($editors) > 0)
                        COLORS LIST OF {{ $editors[0]->project->title }}
                    @else
                        There is no Color
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                @if (Auth::user()->usertype == 'admin')
                    @if (count($editors) == 0)
                        <span style="float:right;"><a href="{{ route('editor.create', request()->route('projectid')) }}"
                                class="btn me-2" style="background-color: #e3f2fd">Add
                                new</a></span>
                    @endif
                @endif
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        {{--  <div class="row">  --}}
        @if (count($editors) !== 0)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Border Color</th>
                        <th>Body Color</th>
                        <th>Terms & Condition</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach ($editors as $item)
                    <tr>
                        <td><span style="color: {{ $item->border_color }};">{{ $item->border_color }}</td>
                        <td><span style="color: {{ $item->body_color }};">{{ $item->body_color }}</td>
                        <td>{!! $item->term_condition !!}</td>
                        <td><a class="btn btn-primary shadow-none" href="{{ route('editor.edit', $item->id) }}">Edit</a>
                        </td>
                    </tr>
        @endforeach
        </tr>
        </tbody>
        </table>
        @endif
    </div>
@endsection
