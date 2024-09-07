{{-- Features --}}
<div id="Aminities" class="tabcontent ps-5" style="background-color: #e4ebf1;">
    <div class="mb-3">
        <h2 class="mt-3" style="color: var(--primary);">AMINITIES</h2>
        <hr size="8" width="170" style="color: var(--primary);">  
    </div>
    @foreach ($aminities->chunk(4) as $items)
    <div class="row" style="gap:55px;">
        @foreach ($items as $item)
        <div class="col-lg-2 d-flex align-items-center " style="gap:5px" >
            <div class="border border-3 p-2 " style="border-color:var(--primary)!important; border-radius:5px 5px 5px 5px;">
            <img src="{{url('/')}}/aminitie-icon/{{$item->icon}}" alt="" width="70" height="70">
            </div>
            <div class=" mb-5">
            <h5 class="mt-5" style="color: var(--primary); width:auto;">{{$item->title}}</h5>
            </div>
            
      
        </div>
        @endforeach
    </div>
    @endforeach
</div>
{{-- Features --}}