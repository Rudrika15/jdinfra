@extends('layouts.app')

@section('content')
    <div class="container-fluid  p-0 m-0">

        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col d-flex justify-content-end align-items-center">
                @if (Auth::user()->usertype == 'admin')
                    <a href="{{ route('coordinate.create', request()->route('projectid')) }}" class="btn me-2"
                        style="background-color: #e3f2fd">Add New
                        Coordinate</a>
                    <a href="{{ route('coordinate.show', request()->route('projectid')) }}" class="btn me-2"
                        style="background-color: #e3f2fd">View
                        Coordinate</a>
                @endif
                <a href="{{ route('project.show', request()->route('projectid')) }}" class="btn"
                    style="background-color: #e3f2fd">Back</a>
            </div>
        </div>

        @if (isset($layout[0]))
            <div style="width: calc(100% - 17px); height: auto; overflow: auto;" class="border border-3 "
                id="plotContainer">
                <img id="plotImage" src="{{ url('/') }}/gallery-images/{{ $layout[0]->imageurl }}"
                    style="width: 1500px; height: 1055px; " alt="Plot Layout">
            </div>
        @else
            <h1>No layout image available.</h1>
        @endif

    </div>


    <script>
        var coordinates = @json($coordinates);

        // Function to mark plots
        function markPlots() {
            var image = document.getElementById('plotImage');
            var canvas = document.createElement('canvas');
            var scaleRatio = 3; // Adjust this as needed

            canvas.width = image.width * scaleRatio;
            canvas.height = image.height * scaleRatio;

            var ctx = canvas.getContext('2d');
            // Scale canvas context to match canvas dimensions
            ctx.scale(scaleRatio, scaleRatio);

            // Enable antialiasing
            ctx.imageSmoothingEnabled = true;
            ctx.imageSmoothingQuality = 'high';

            ctx.drawImage(image, 0, 0, 1500, 1055);
            console.log(coordinates);

            coordinates.forEach(function(coordinate) {
                var plotCoordinates = [{
                        x: coordinate.x1,
                        y: coordinate.y1
                    },
                    {
                        x: coordinate.x2,
                        y: coordinate.y2
                    },
                    {
                        x: coordinate.x3,
                        y: coordinate.y3
                    },
                    {
                        x: coordinate.x4,
                        y: coordinate.y4
                    }
                ];

                // Check if x.5 and y.5 exist before adding them to plotCoordinates
                if (coordinate.x5 !== null && coordinate.y5 !== null && coordinate.x6 !== null && coordinate.y6 !==
                    null) {
                    plotCoordinates.push({
                        x: coordinate.x5,
                        y: coordinate.y5
                    }, {
                        x: coordinate.x6,
                        y: coordinate.y6
                    });
                }


                ctx.beginPath();
                ctx.moveTo(plotCoordinates[0].x, plotCoordinates[0].y);

                for (var i = 1; i < plotCoordinates.length; i++) {
                    ctx.lineTo(plotCoordinates[i].x, plotCoordinates[i].y);
                }

                ctx.closePath();

                // Set color based on the presence of color attribute
                let book_status = coordinate.book_status;

                if (book_status == "Sold") {
                    ctx.fillStyle = "rgba(0, 255, 0, 0.5)";
                } else {
                    ctx.fillStyle = 'rgba(255, 0, 0, 0.5)';
                }

                ctx.fill();
            });

            // Replace the image with the marked canvas
            image.parentNode.replaceChild(canvas, image);
        }

        // Call markPlots function when the page loads
        window.onload = function() {
            markPlots();
        };
    </script>
@endsection
