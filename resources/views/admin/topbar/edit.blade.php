@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">
                    UPDATE &nbsp;-&nbsp; TOPBAR
                </h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right"><a href="{{ route('topbar.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid  p-5 mb-5 ">
            <form action="{{ route('topbar.update', $topbars->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $topbars->title }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact1</label>
                    <input type="text" name="contact1" class="form-control" id="contact" placeholder="xxxxx4567"
                        value="{{ $topbars->contact1 }}">
                    <span class="text-danger" value="{{ $topbars->title }}">
                        @error('contact1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact2</label>
                    <input type="text" name="contact2" class="form-control" id="contact" placeholder="xxxxx4567"
                        value="{{ $topbars->contact2 }}">
                    <span class="text-danger">
                        @error('contact2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact3</label>
                    <input type="text" name="contact3" class="form-control" id="contact" placeholder="xxxxx4567"
                        value="{{ $topbars->contact3 }}">
                    <span class="text-danger">
                        @error('contact3')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4"
                        value="{{ $topbars->email }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Facebook</label>
                    <input type="text" name="social_logo1" class="form-control" id="logo"
                        value="{{ $topbars->social_logo1 }}">
                    <span class="text-danger">
                        @error('social_logo1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Youtube</label>
                    <input type="text" name="social_logo2" class="form-control" id="logo"
                        value="{{ $topbars->social_logo2 }}">
                    <span class="text-danger">
                        @error('social_logo2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Instagram</label>
                    <input type="text" name="social_logo3" class="form-control" id="logo"
                        value="{{ $topbars->social_logo3 }}">
                    <span class="text-danger">
                        @error('social_logo3')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn shadow-none btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
