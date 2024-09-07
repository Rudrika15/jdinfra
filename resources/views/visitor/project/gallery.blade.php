<!-- Gallery -->
<div id="Gallery" class="tabcontent" style="background-color: #e4ebf1;">
    <div class="mb-3">
        <h2 class="mt-3" style="color: var(--primary);">GALLERY</h2>
        <hr size="8" width="170" style="color: var(--primary);">
    </div>

    <div class="f-container" style="border: none;">
        <div>
            <ul class="gallery" style="list-style: none; padding: 0; margin: 0;">
                @foreach ($gallery->chunk(3) as $items)
                    <div style="display: flex;">
                        @foreach ($items as $item)
                            <li style="flex: 0 0 33.33%; padding: 5px;">
                                <a href="{{ url('/') }}/gallery-images/{{ $item->imageurl }}"
                                    data-lightbox="gallery">
                                    <img src="{{ url('/') }}/gallery-images/{{ $item->imageurl }}" width="100%"
                                        height="200px" alt="Image" style="border-radius: 8px;">
                                </a>
                            </li>
                        @endforeach
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- Gallery -->
