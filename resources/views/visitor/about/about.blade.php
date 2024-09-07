@extends('visitor.layouts.visitor')

@section('maincontain')
    <style>
        .page-header {
            @if ($bgimages->isNotEmpty())
                background: url('{{ asset('background-images/' . $bgimages->first()->imageurl) }}') center center no-repeat;
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
            <h1 class="display-1 text-white animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home.index') }}">Home</a></li>

                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        @foreach ($images as $item)
                            <img class="img-fluid" src="{{ url('/') }}/aboutus-images/{{ $item->imageurl }}"
                                alt="">
                        @endforeach


                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s"
                    style="  text-align: justify;
            text-justify: inter-word;">
                    <h1 style="color: #0b6ab2">ABOUT US</h1>
                    <h1 class="display-5 mb-4">JD Infraspace Pvt.Ltd.is one of the most trusted Ahmedabad based real estate
                        developers dealing site development.</h1>
                    <p>JD Infraspace has built its reputation on Real Estate strength, the ability to respond quickly to
                        opportunities in the marketplace, and a history of positive performance on behalf of our clients.

                        Founded in 2005, we have achieved consistent growth and profitability. We are all bound by our
                        commitment to always serve our clients and customers, putting their needs above all else.The group
                        has many projects and more than 20000 customers have endorsed the project.</p>

                    <p class="mb-4">We believe in being straightforward in our communications, dealing openly and
                        honestly, and developing a reliable relationship. The company aims at helping middle class families
                        to fulfill the dream of having own plot or villa at a very nominal monthly instalment. The company
                        has won the trust by transparent presentation and has always delivered what is promised.</p>




                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-4">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5"
                    style="width: 120px; height: 120px; border-color: #0b6ab2!important;">
                    <h1 class="display-1 mb-n2" data-toggle="counter-up">19</h1>
                </div>
                <div class="ps-4">
                    <h3>Years</h3>
                    <h3>Working</h3>
                    <h3 class="mb-0">Experience</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-4">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5"
                    style="width: 120px; height: 120px; border-color: #0b6ab2!important;">
                    <h1 class="display-1 mb-n2 " style="font-size: 40px!important;">1000+</h1>
                </div>
                <div class="ps-4">
                    <h3>Satisfied</h3>
                    <h3>Customers</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-4" style="padding-right: 27px;">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5"
                    style="width: 120px; height: 120px; border-color: #0b6ab2!important;">
                    <h1 class="display-1 mb-n2 " style="font-size: 40px!important;">10+</h1>
                </div>
                <div class="ps-4">
                    <h3>Projects</h3>
                </div>
            </div>
        </div>
    </div>




    </div>

    <!-- About End -->


    @include('visitor.about.team')
    @include('visitor.about.mission')
@endsection
