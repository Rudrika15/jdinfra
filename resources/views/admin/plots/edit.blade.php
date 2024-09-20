@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-8">
                <h4 class="text-white">UPDATE &nbsp;-&nbsp; {{ $plotmaster->sector->project->title }} SECTOR
                    {{ $plotmaster->sector->sectorname }} OF
                    PLOT NO {{ $plotmaster->plotnumber }}</h4>
            </div>
            <div class="col-lg-4 d-flex justify-content-end align-items-center">
                <span style="float:right"><button onclick="history.back()" class="btn"
                        style="background-color: #e3f2fd">Back</button></span>
            </div>
        </div>
        <div class="container-fluid p-5">

            <form action="{{ route('plot.update', $plotmaster->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="area" class="form-label"> Area</label>
                    <input type="text" name="area" class="form-control" id="area"
                        value="{{ $plotmaster->area }}">
                    <span class="text-danger">
                        @error('area')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                {{-- <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="Sold" {{ $plotmaster->status == 'Sold' ? 'selected' : '' }}>Sold</option>
                        <option value="Hold" {{ $plotmaster->status == 'Hold' ? 'selected' : '' }}>Hold</option>
                        <option value="Unsold" {{ $plotmaster->status == 'Unsold' ? 'selected' : '' }}>Unsold</option>
                    </select>
                    <span class="text-danger">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </span>
                </div> --}}
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
