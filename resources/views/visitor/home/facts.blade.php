{{-- properties section start --}}
<div class="container mb-3">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading fs-5" style="color: #0b6ab2">Our Projects</span>
            <h2 class="properti-title mb-2">Visit Our Latest Projects And Our Innovative Works</h2>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">
    {{-- row-1 --}}
    <div class="row g-3 g-md-5 mb-2">
        @foreach ($projects as $item)
        <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp border-none mb-3">
            <a href="{{ route('projectdetails',[ $item->id,str_replace(' ','-',$item->title)]) }}" class="text-decoration-none link-dark">
                <div class="card shadow h-100">
                    <img src="{{ url('/') }}/project-images/{{ $item->imageurl }}" class="card-img-top" alt="..."
                        style="width: 100%;">
                    <div class="card-body d-flex flex-column p-3">
                        <div>
                            
                                <h6 class="card-title">{{ $item->title }}</h6>
                            </a>
                        </div>
                        <a href="{{ route('projectdetails', [ $item->id,str_replace(' ','-',$item->title)]) }}">
                        <span class="location d-inline-block mb-3 ps-2">
                            <i class="bi bi-geo-alt-fill pe-1"></i>{{ $item->location }}
                        </span>
                        <div class="mt-auto">
                            <a href="{{ route('projectdetails',[ $item->id,str_replace(' ','-',$item->title)]) }}"
                                class="btn text-white ps-1"
                                style="background-color: #0b6ab2;">Know
                                More</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    {{-- row-1 --}}
</div>
{{-- properties section end --}}
