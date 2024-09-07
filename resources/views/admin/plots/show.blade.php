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
                    @if (count($plots) > 0)
                        PLOTS OF {{ $plots[0]->sector->project->title }}
                    @else
                        There is no plots
                    @endif
                </h2>

            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">

                <span style="float:right">
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('plot.trash', request()->route('projectid')) }}" class="btn"
                            style="background-color: #e3f2fd">Go To Trash</a>
                    @endif
                    <a href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                        style="background-color: #e3f2fd">Back</a>
                </span>

            </div>
        </div>
        <div class="container-fluid p-5">
            <div class="row col-12">
                @foreach ($sectors as $sector)
                    <div class="col-sm-12 mt-2 border p-3">

                        <div class="row p-3">
                            <div class="col-10">
                                <h5 class="card-title">SECTOR NO : {{ $sector->sectorname }}</h5>
                            </div>
                            @if (Auth::user()->usertype == 'admin')
                                <div class="col-2">
                                    <a class="btn btn-warning shadow-none" style="float:right"
                                        href="{{ route('plot.create', $sector->id) }}">Add Ploat</a>
                                </div>
                            @endif
                        </div>

                        <div class="row p-3">
                            @foreach ($sector->plot as $plot)
                                <div style="color:white ;width:8rem;height:6rem"
                                    class="col-2 m-1 {{ $plot->status == 'Sold' ? 'btn btn-success ' : ($plot->status == 'Resold' ? 'btn btn-danger' : 'btn btn-info') }}">
                                    {{ $plot->plotnumber }} ({{ $plot->area }})
                                    <br><br>
                                    @if ($plot->status == 'Unsold' || $plot->status == 'Resold')
                                        <a href="{{ route('admin.booking.newbooking', $plot->id) }}"><i class="fas fa-plus"
                                                style="color:white"></i></a>
                                    @endif
                                    @if (Auth::user()->usertype == 'admin')
                                        <a href="{{ route('plot.edit', $plot->id) }}"><i class="fas fa-edit"
                                                style="color:white"></i></a>
                                        <a onclick="return confirm('do you want to delete it?')"
                                            href="{{ route('plot.delete', $plot->id) }}"><i class="fas fa-trash"
                                                style="color:white"></i></a>
                                    @endif
                                </div>
                            @endforeach

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
