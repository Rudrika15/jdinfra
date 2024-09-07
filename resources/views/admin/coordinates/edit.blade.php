@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-5 m-0">
        <div class="row my-3 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">Update coordinate</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('coordinate.show', $coordinate->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        {{--  <h2>Update</h2>  --}}
        <div class="container-fluid p-5">

            <form action="{{ route('coordinate.update', $coordinate->id) }}" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="projectid" value={{ $coordinate->projectid }} />
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="sector_name" class="form-label">Sector_Name</label>
                        <input type="text" name="sector_name" class="form-control" id="sector_name"
                            value="{{ $coordinate->sector_name }}">
                        <span class="text-danger">
                            @error('sector_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="plot_id" class="form-label">Plot_No</label>
                        <input type="text" name="plot_id" class="form-control" id="plot_id"
                            value="{{ $coordinate->sector_name }}">
                        <span class="text-danger">
                            @error('plot_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-6 mb-3">
                        <label for="x1" class="form-label">X1</label>
                        <input type="text" name="x1" class="form-control" id="x1"
                            value="{{ $coordinate->x1 }}">
                        <span class="text-danger">
                            @error('x1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="y1" class="form-label">Y1</label>
                        <input type="text" name="y1" class="form-control" id="y1"
                            value="{{ $coordinate->y1 }}">
                        <span class="text-danger">
                            @error('y1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-6 mb-3">
                        <label for="x2" class="form-label">X2</label>
                        <input type="text" name="x2" class="form-control" id="x2"
                            value="{{ $coordinate->x2 }}">
                        <span class="text-danger">
                            @error('x2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="y2" class="form-label">Y2</label>
                        <input type="text" name="y2" class="form-control" id="y2"
                            value="{{ $coordinate->y2 }}">
                        <span class="text-danger">
                            @error('y2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-6 mb-3">
                        <label for="x3" class="form-label">X3</label>
                        <input type="text" name="x3" class="form-control" id="x3"
                            value="{{ $coordinate->x3 }}">
                        <span class="text-danger">
                            @error('x3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="y3" class="form-label">Y3</label>
                        <input type="text" name="y3" class="form-control" id="y3"
                            value="{{ $coordinate->y3 }}">
                        <span class="text-danger">
                            @error('y3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-6 mb-3">
                        <label for="x4" class="form-label">X4</label>
                        <input type="text" name="x4" class="form-control" id="x4"
                            value="{{ $coordinate->x4 }}">
                        <span class="text-danger">
                            @error('x4')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="y4" class="form-label">Y4</label>
                        <input type="text" name="y4" class="form-control" id="y4"
                            value="{{ $coordinate->y4 }}">
                        <span class="text-danger">
                            @error('y4')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-lg-6 mb-3">
                        <label for="x5" class="form-label">X5</label>
                        <input type="text" name="x5" class="form-control" id="x5"
                            value="{{ $coordinate->x5 }}">
                        <span class="text-danger">
                            @error('x5')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="y5" class="form-label">Y5</label>
                        <input type="text" name="y5" class="form-control" id="y5"
                            value="{{ $coordinate->y5 }}">
                        <span class="text-danger">
                            @error('y5')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
