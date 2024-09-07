@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="successMessage">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">
                    @if (count($sectors) > 0)
                        TRASH DATA ODF SECTOR {{ $sectors[0]->project->title }}
                    @else
                        There is no Sector
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('sector.index', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>

        <div class="container-fluid p-5">
            <div class="row">
                @foreach ($sectors as $item)
                    <div class="col-sm-4">
                        <div class="card m-3">

                            <div class="card-body">
                                <h5 class="card-title">{{ $item->project->title }}</h5>
                                <p class="card-text">SECTOR NO : {{ $item->sectorname }}</p>
                            </div>

                            @if (Auth::user()->usertype == 'admin')
                                <div class="card-body">
                                    <a onclick="return confirm('do you want to restore it')" class="btn btn-primary shadow-none"
                                        href="{{ route('sector.restore', $item->id) }}">Restore</a>
                                    <a onclick="return confirm('do you want to permanently delete it?')"
                                        class="btn btn-danger shadow-none"
                                        href="{{ route('sector.destroy', $item->id) }}">Delete</a>

                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
