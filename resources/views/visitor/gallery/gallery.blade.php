@extends('visitor.layouts.visitor')

@section('maincontain')
    <style>
        .page-header {
            @if ($images->isNotEmpty())
                background: url('{{ asset('background-images/' . $images->first()->imageurl) }}') center center no-repeat;
            @else
                /* Fallback background if there are no images in the collection */
                background-color: #f0f0f0;
            @endif
            /* Additional CSS properties if needed */
            background-size: cover;
            /* or use 'contain' based on your requirements */

        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Our Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home.index') }}">Home</a></li>

                    <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    {{-- <div class="text-center mx-auto mb-2 mt-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h4 class="section-title">Our Projects</h4>
        <h1 class="display-5 mb-4">Visit Our Latest Projects And Our Innovative Works</h1>
    </div>



<div class="container d-flex justify-content-center">
    <div class="gallery">
        <div class="gallery-image" >
            <div class="row" style="background-color: rgb(223, 231, 237);">
                
            @foreach ($projects as $project)
             <h1 class="gallery-heading text-center  mb-5 mt-5" style="background-color: #0b6ab2; color: white; border-radius: 15px 15px 15px 15px">{{ $project->title }}</h1>

                @foreach ($project->galleries as $gallery)
                    <div class="col-lg-4 mb-5">
                        <a href="{{url('/')}}/gallery-images/{{$gallery->imageurl}}" data-lightbox="gallery">
                            <img  src="{{url('/')}}/gallery-images/{{$gallery->imageurl}}" width="370" height="100%" alt="Image" style="flex-shrink: 0; border-radius: 5%"></a>
                    </div>

                @endforeach
        @endforeach
                
                    
            </div>
            </div>
            
        </div>
    </div>
</div> --}}

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">ALL</button>
                </li>
                @foreach ($projects as $project)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#project-{{ $project->id }}"
                            type="button" role="tab" aria-controls="project-{{ $project->id }}"
                            aria-selected="false">{{ $project->title }}</button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row">
                        @foreach ($projects as $project)
                            @foreach ($project->galleries as $gallery)
                                <div class="col-lg-4 mb-4">
                                    <a href="{{ url('/') }}/gallery-images/{{ $gallery->imageurl }}"
                                        data-lightbox="gallery">
                                        <img src="{{ url('/') }}/gallery-images/{{ $gallery->imageurl }}"
                                            class="img-fixed-rectangle" style="height: 300px;" alt="Image">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @foreach ($projects as $project)
                    <div class="tab-pane fade" id="project-{{ $project->id }}" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row">
                            @foreach ($project->galleries as $gallery)
                                <div class="col-lg-4 mb-4">
                                    <a href="{{ url('/') }}/gallery-images/{{ $gallery->imageurl }}"
                                        data-lightbox="gallery">
                                        <img src="{{ url('/') }}/gallery-images/{{ $gallery->imageurl }}"
                                            class="img-fixed-rectangle" alt="Image">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
