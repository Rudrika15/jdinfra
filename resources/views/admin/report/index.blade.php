@extends('layouts.app')
@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white">FILTERED DATA</h2>
            </div>
            {{--  <div class="col-lg-6"><span style="float: right">
                    <a onclick="history.back()" class="btn btn-primary">Back</a>
                </span></div>  --}}
        </div>
        <div class="container-fluid p-5">
            <div class="row justify-content-center">
                <form action="{{ route('filter-data') }}" method="get">
                    <div class="row">
                        <div class="col-3 mb-3">
                            Project : <br><br>
                            <select name="project" id="project" class="form-select">
                                <option value="">All Projects</option>
                                @foreach ($project as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            Agent : <br><br>
                            @if (Auth::user()->usertype == 'admin')
                                <select name="agent" id="agent" class="form-select">
                                    <option value="">All Agents</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="agent" id="agent" class="form-select">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                </select>
                            @endif
                        </div>
                        <div class="col-3 mb-3">
                            Status : <br><br>
                            <select name="status" id="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="booking" class="form-label"> Booking</label>
                        <div class="col-2">
                            <input type="date" name="strt_date" class="form-control" id="strt_date">
                            <span class="text-danger">
                                @error('strt_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        To
                        <div class="col-2">
                            <input type="date" name="end_date" class="form-control" id="end_date">
                            <span class="text-danger">
                                @error('end_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary shadow-none ">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
