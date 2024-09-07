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
                        TRASH PLOTS OF {{ $plots[0]->sector->project->title }}
                    @else
                        There are no plots
                    @endif
                </h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('plot.index', request()->route('projectid')) }}" class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <div class="row col-12">
                @foreach ($plots->groupBy('sectormasterid') as $sectorId => $sectorPlots)
                    @if ($sectorPlots->isNotEmpty())
                        <div class="col-sm-12 mt-2 border p-3">
                            <div class="row p-3">
                                <div class="col-10">
                                    <h5 class="card-title">SECTOR NO: {{ $sectorPlots->first()->sector->sectorname }} </h5>
                                </div>
                            </div>
            
                            <div class="row p-3">
                                @foreach ($sectorPlots as $plot)
                                    <div style="width: 12rem; height: 6rem" class="col-2 m-1 {{ $plot->status == 'Sold' ? 'btn btn-success' : ($plot->status == 'Hold' ? 'btn btn-danger' : 'btn btn-info') }}">
                                        {{ $plot->plotnumber }} ({{ $plot->area }})
                                        <br><br>
                                        <div>
                                            <a href="{{ route('plot.restore', $plot->id) }}" onclick="return confirm('do you want to restore it')" class="btn btn-primary shadow-none mb-2">Restore</a>
                                            <a href="{{ route('plot.destroy', $plot->id) }}" onclick="return confirm('do you want to permanently delete it')" class="btn btn-danger shadow-none mb-2">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
