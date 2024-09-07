  {{-- slider --}}
  
<div class="container-fluid">
   
      @foreach ($sliders as $item )
      <img src="{{url('/')}}/slider-images/{{$item->imageurl}}" class="d-block" alt="..."  style="width: 100%;">
      @endforeach
   

  </div>
</div>
 
{{-- slider --}}