<!-- location -->
<div id="Location" class="tabcontent ps-3 ps-md-5" style="background-color: #e4ebf1;">
    <div class="mb-3">
        <h2 class="mt-3" style="color: var(--primary);">LOCATION</h2>
        <hr size="8" width="170" style="color: var(--primary);">  
    </div>
    <div class="p-3 p-md-5">
        @foreach ($progallery as $item)
            <div class="mb-4">
                <img src="{{url('/')}}/gallery-images/{{$item->imageurl}}" alt="Location Image" style="width: 100%; border-radius: 8px;">
            </div>
        @endforeach
    </div>
</div>
<!-- location -->


