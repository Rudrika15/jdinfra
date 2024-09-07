		
      {{-- floor plan --}}
      <div id="Floor Plan" class="tabcontent ps-5" style="background-color: #e4ebf1;">
        <div class="mb-3">
            <h2 class="mt-3" style="color: var(--primary);">FLOOR PLANS</h2>
            <hr size="8" width="170" style="color: var(--primary);">  
        </div>
        <div class="f-container " style="border: none;">
           
            <div>
            <ul class="gallery">
            <div style="display: flex;">
              <li><a href="{{asset('templatevisitor/img/floor/AV.png')}}"><img src="{{asset('templatevisitor/img/floor/AV.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_C1.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_C1.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_C2.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_C2.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_C3.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_C3.png')}}" style="width: 100%;" alt="Image"></a></li>
            </div>
            <div style="display: flex;">
              <li><a href="{{asset('templatevisitor/img/floor/Block_C4.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_C4.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_D1.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_D1.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_D2.png')}}"><img src="{{asset('templatevisitor/img/floor/Block_D2.png')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Ground_Floor_Plan.png')}}"><img src="{{asset('templatevisitor/img/floor/Ground_Floor_Plan.png')}}" style="width: 100%;" alt="Image"></a></li>
            </div>
            <div style="display: flex;">
              <li><a href="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}"><img src="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}"><img src="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}"><img src="{{asset('templatevisitor/img/floor/Block_A_thumb.jpg')}}" style="width: 100%;" alt="Image"></a></li>
              <li><a href="{{asset('templatevisitor/img/floor/Block_B_thumb.jpg')}}"><img src="{{asset('templatevisitor/img/floor/Block_B_thumb.jpg')}}" style="width: 100%;" alt="Image"></a></li>
            </div>
            </ul>
        </div>
          </div>
          
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
          <script src="assets/js/jquery.lightbox.js"></script>
          <script>
            // Initiate Lightbox
            $(function() {
              $('.gallery a').lightbox(); 
            });
          </script>
      </div>
         {{-- floor plan --}}