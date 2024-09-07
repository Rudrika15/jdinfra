@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h2 class="text-white"> Change Password</h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float: right">
                    <a onclick="history.back()" class="btn" style="background-color: #e3f2fd">Back</a>
                </span>
            </div>
        </div>
        <div class="container-fluid p-5">
            @if (session('error'))
                <h5 class="alert alert-danger mb-2">{{ session('error') }}</h5>
            @endif
            @if (session('Success'))
                <h5 class="alert alert-success mb-2">{{ session('Success') }}</h5>
            @endif
            <form action="{{ route('admin.user.updatepassword', $user->id) }}" method="post">
                @csrf
                {{-- @method('put') --}}
                <div class="col mb-3">
                    <label for="name" class="form-label">Enter Current Password</label>
                    <input type="password" name="old_password" class="form-control">
                    <span class="text-danger">
                        @error('old_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="name" class="form-label">Enter New Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-5">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" />
                    <span class="text-danger">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
