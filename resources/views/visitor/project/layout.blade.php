{{-- Layout Plan --}}
<div id="Layout Plan" class="tabcontent ps-5" style="background-color: #e4ebf1;">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <div class="mb-3">
                <h2 class="mt-3" style="color: var(--primary);">LAYOUT PLANS</h2>
                <hr size="8" width="170" style="color: var(--primary);">  
            </div>
        </div>
        <div class="col-lg-4" style="float: left: ">
            @foreach ($layout as $item)
           <a href="{{url('/')}}/gallery-images/{{$item->imageurl}}" download>
            <button class="btn text-white shadow-none  py-1" type="submit" style="background-color: #0b6ab2">
                <i class="bi bi-download fs-5 text-white me-2"></i>
                LAYOUTPLAN</button> </a>
            @endforeach
           
        </div>
       
        
    </div>

  <div class="f-container">
      @foreach ($progallerys as $item)
          <div class="mb-4">
              <ul class="gallery">
                  <li style="list-style-type: none;">
                    <a data-fancybox="gallery" href="{{url('/')}}/gallery-images/{{$item->imageurl}}"
                        data-caption="Image Caption"
                        data-options='{"buttons": ["slideShow", "fullScreen"], "thumbs": {"autoStart": true, "hideOnClose": true}, "animationEffect": "fade", "transitionEffect": "slide", "touch": false, "wheel": false}'
                        data-fancybox-id="{{$loop->index}}">
                         <img src="{{url('/')}}/gallery-images/{{$item->imageurl}}" class="img-fluid" alt="Image">
                     </a>
                  </li>
              </ul>
          </div>
      @endforeach
  </div>
</div>



{{-- Layout Plan --}}
