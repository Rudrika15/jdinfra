{{-- location map --}}
<div id="Location Map" class="tabcontent ps-3 ps-md-5 p-5" style="background-color: #e4ebf1;">
    <div class="mb-3">
        <h2 class="mt-3" style="color: var(--primary);">LOCATION MAP</h2>
        <hr size="8" width="170" style="color: var(--primary);">  
    </div>
    <div class="responsive-iframe-container">
        <iframe src="{{$project->map}}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
{{-- location map --}}
