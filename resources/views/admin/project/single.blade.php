<div class="container">
    @foreach ($projects as $item)
        <div class="row border  p-5">
            <h3>{{ $item->title }}</h3>
            <div class="row mt-3">
                <img style="width: 50%" src="{{ url('/') }}/project-images/{{ $item->imageurl }}"><br>
                {{-- <p class="pt-3">
                    <b>Brouchure : </b>
                    <a href="{{ url('/') }}/brochure-images/{{ $item->brochure }}" target="_blank"> View Brochure
                    </a>
                </p> --}}
                {{-- <p> <b>Location :</b> {{ $item->location }}</p>
                <p><b>Description :</b> {{ $item->description }}</p>
                <p><b>Map : </b> {{ $item->map }}</p>
                <p><b>Aminities :</b> {!! $item->aminities !!}</p>
                <p><b>About :</b> {!! $item->about !!}</p> --}}
            </div>
        </div>
    @endforeach
</div>
