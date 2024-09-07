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
            <h1 class="display-1 text-white animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home.index') }}">Home</a></li>

                    <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissable">
                    {{ $message }}
                </div>
            @endif
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">

                <h1 class="display-5 mb-4">If You Have Any Query, Please Feel Free Contact Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-map-marker-alt text-white
                            "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Address</p>
                                <h3 class="mb-0">303 /312, Ashirvad Complex
                                    near Prahladnagar Auda garden, Prahladnagar
                                    Ahmedabad, Gujarat 380015</h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-phone-alt text-white
                            "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Call Us</p>
                                <h3 class="mb-0"><a class=" text-dark"
                                        href="tel:{{ $topbars->contact1 }}">{{ $topbars->contact1 }} |</a>
                                    <a class="text-dark " href="tel:{{ $topbars->contact2 }}">{{ $topbars->contact2 }} |</a>
                                    <br>
                                    <a class="text-dark " href="tel:{{ $topbars->contact3 }}">{{ $topbars->contact3 }}</a>
                                </h3>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark"
                                style="width: 55px; height: 55px;">
                                <i class="fa fa-envelope-open text-white
                            "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Mail Us</p>
                                <h3 class="mb-0"> <a class="text-dark "
                                        href="mailto:{{ $topbars->email }}">{{ $topbars->email }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4" style="color: #0b6ab2;">Complete the form below to reach JDInfraspace Pvt Ltd. Your
                        queries matter to us,
                        and we're here to assist you promptly.</p>
                    <form method="POST" action="{{ route('addcontact') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="name" placeholder="Your Name">
                                    <label for="name">Name</label>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" min="1"  value="{{ old('mobile') }}" name="mobile" class="form-control"
                                        pattern="^[0-9-+\s()]*$" id="mobile" placeholder="mobile">
                                    <label for="mobile">Mobile Number</label>
                                    <span class="text-danger">
                                        @error('mobile')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control"  value="{{ old('message') }}" name="message" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                    <span class="text-danger">
                                        @error('message')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn text-white w-100 py-3" type="submit"
                                    style="background-color: #0b6ab2">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.34604885752!2d72.50483601495694!3d23.01106302253246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b278bd5fc37%3A0xdedff95974f13952!2sBalajay+Infrastructure+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1546685839604"
            width="100%" height="500" frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- Google Map End -->
@endsection
