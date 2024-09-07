@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            {{--  <div class="py-3">
                <h2>
                    @if(count($flipbooks)>0) 
                    FLIPBOOK OF {{$flipbooks[0]->project->title}}
                    @else
                    There is no flipbooks  
                    @endif  
                </h2>

              

                <span style="float:right; margin-right: 1%"><a
                        href="{{ route('project.show', request()->route('projectid')) }}"
                        class="btn btn-primary">Back</a></span>
            </div>  --}}
            {{--  @foreach ($flipbooks as $item)
            <div class="row mt-3">
                <img style="width: 10%" src="{{ url('/') }}/flipbook-images/{{ $item->imageurl }}"
                            class="card-img-top" alt="...">
                         
               <div class="mt-2">
                            <a class="btn btn-primary" href="{{ route('flipbook.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger"
                                href="{{ route('flipbook.delete', $item->id) }}">Delete</a>
                        </div>
               
            </div>  --}}
            <div class="py-3 ">
                <span><h4>Aboutus Image</h4></span>   
                <span style="float:right; "><a href="{{ route('aboutusimage.create') }}"
                    class="btn btn-primary">Add New</a></span> 
        </div>
            
            @foreach ($images as $item)
                <div class="col-4 mt-4">
                    <div class="card" style="width:18rem; min-height:100px;">
                        <img width="10%" src="{{ url('/') }}/aboutus-images/{{ $item->imageurl }}"
                            class="card-img-top" alt="...">


                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('aboutusimage.edit', $item->id) }}">Edit</a>
                            <a onclick="return confirm('do you want to delete it?')" class="btn btn-danger shadow-none"
                                href="{{ route('aboutusimage.delete', $item->id) }}">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
