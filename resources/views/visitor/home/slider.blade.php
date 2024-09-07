<!-- Carousel Start -->

<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">


        @foreach ($sliders as $key => $item)
            
        
        <div class="owl-carousel-item position-relative {{$key == 0 ? 'active' : ''}}"
            data-dot=" <img src={{url('/')}}/slider-images/{{$item->imageurl}}>">
            <img class="img-fluid" src="{{url('/')}}/slider-images/{{$item->imageurl}}" alt="" style=" width: 100%; 
            max-height: 100%;">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                           

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        
        


       
    </div>

</div>

    <!-- Carousel End -->

    
