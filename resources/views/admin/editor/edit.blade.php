@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">Edit Colors</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('editor.index', $editor->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container p-5">
            <form method="POST" action="{{ route('editor.update', $editor->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="border_color">Border Color:</label>
                    <input type="color" name="border_color" id="border_color" value="{{ $editor->border_color }}">
                    <span class="text-danger">
                        @error('border_color')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="body_color">Body Color:</label>
                    <input type="color" name="body_color" id="body_color" value="{{ $editor->body_color }}">
                    <span class="text-danger">
                        @error('body_color')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="term_condition" class="my-3">Terms & Condition</label>
                    <textarea class="summernote form-control" name="term_condition" id="" cols="3" rows="3">{{ $editor->term_condition }}</textarea>
                    <span class="text-danger">
                        @error('term_condition')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <!-- Other form fields... -->
                <div class="text-center mt-5">
                    <button class="btn btn-primary shadow-none" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
