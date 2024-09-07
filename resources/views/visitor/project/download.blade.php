<!-- Your HTML structure for the Download tab button or link -->


<div id="Download" class="tabcontent" style="background-color: #e4ebf1;">
    <div class="mb-3">
        <h2 class="mt-3" style="color: var(--primary);">DOWNLOAD</h2>
        <hr size="8" width="170" style="color: var(--primary);">
    </div>

    @if(isset($flipbooks) && count($flipbooks) > 0)
    <span id="mypdfbook" style="display: none">
        {{ url('/') }}/flipbook-pdf/{{ $flipbooks[0]->imageurl }}
    </span>
@else
    <span id="mypdfbook" style="display: none">
        <!-- Provide a fallback URL or handle this case -->
    </span>
@endif

    <div id="flipbookContainer" style="width: 100%; height: 100%;">
    </div>
</div>

@push('scripts')
    <script src="{{asset('flipbook/lib/js/libs/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('flipbook/lib/js/dflip.min.js')}}" type="text/javascript"></script>

    <script>
      
        // Function to initialize flipbook
        function initializeFlipbook() {
            var pdf = $("#mypdfbook").text();
            var options = {
                height: 1000,
                duration: 500,
                backgroundColor: "#e4ebf1",
            };
            var flipBook = $("#flipbookContainer").flipBook(pdf, options);
            $(".df-ui-thumbnail").addClass("df-active");
        }

        $("#downloadButton").one("click", function () {
            // Call the function to initialize flipbook when the Download tab is clicked
            initializeFlipbook();
        });
    </script>
@endpush
