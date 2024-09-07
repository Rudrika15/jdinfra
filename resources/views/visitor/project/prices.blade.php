<div id="Prices" class="tabcontent ps-5" style="background-color: #e4ebf1;">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <div class="mb-3">
                <h2 class="mt-3" style="color: var(--primary);">PRICE LIST</h2>
                <hr size="8" width="170" style="color: var(--primary);">  
            </div>
        </div>
        <div class="col-lg-4" style="float: left: ">
            @foreach ($price as $item)
           <a href="{{url('/')}}/gallery-images/{{$item->imageurl}}" download>
            <button class="btn text-white shadow-none  py-1" type="submit" style="background-color: #0b6ab2">
                <i class="bi bi-download fs-5 text-white me-2"></i>
                DOWNLOAD PRICE LIST</button> </a>
            @endforeach
           
        </div>
        <div class="f-container">
            @foreach (  $price as $item)
                <div class="mb-4">
                    <ul class="gallery">
                        <li style="list-style-type: none;">
                            <a href="{{url('/')}}/gallery-images/{{$item->imageurl}}" style="width: 100%;">
                                <img src="{{url('/')}}/gallery-images/{{$item->imageurl}}" class="img-fluid" alt="Image">
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
       
    </div>
    </div>