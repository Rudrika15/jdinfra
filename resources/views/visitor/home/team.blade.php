<!-- Team Start -->
<style>
    .page-header {
        @if ($images->isNotEmpty())
            background: url('{{ asset("background-images/" . $images->first()->imageurl) }}') center center no-repeat;
        @else
            /* Fallback background if there are no images in the collection */
            background-color: #f0f0f0;
        @endif
        /* Additional CSS properties if needed */
        background-size: cover; /* or use 'contain' based on your requirements */

}
</style>
<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading fs-5">Why Choose Us!</span>
            <h2 class="properti-title mb-2">Why You Should Trust Us? Learn More About Us!</h2>
        </div>
    </div>
</div>

<div class="container-fluid page-header py-4 mb-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-4 mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                <div class="d-flex flex-column align-items-center">
                   <img class="" src="{{asset('templatevisitor/img/Years of experience.png')}}" alt="" style="width: 200px; height: 200px;">
                </div>   
                </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                <div class="d-flex flex-column align-items-center">
                   <img src="{{asset('templatevisitor/img/CIIENT.png')}}" alt="" style="width: 200px; height: 200px;">
                </div>   
                </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                <div class="d-flex flex-column align-items-center">
                   <img src="{{asset('templatevisitor/img/PROJETS.png')}}" alt="" style="width: 200px; height: 200px;">
                </div>   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Team End -->



