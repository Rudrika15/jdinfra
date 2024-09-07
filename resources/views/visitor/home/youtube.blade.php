<div class="container-fluid">
    <div class="row justify-content-center mb-5 px-0">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading fs-5">LUCKY DRAW EVENTS</span>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide p-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($youtube->chunk(3) as $key => $items)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <div class="d-flex justify-content-center">
                    @foreach ($items as $item)
                    <div class="mx-2" style="width: 33%;">
                        <iframe width="100%" height="200" src="{{$item->youtubeurl}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
