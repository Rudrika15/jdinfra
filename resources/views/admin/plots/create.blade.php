@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-8">
                <h4 class="text-white">ADD NEW PLOT IN SECTOR {{ $sector->sectorname }} OF {{ $sector->project->title }}
                </h4>
            </div>
            <div class="col-lg-4 d-flex justify-content-end align-items-center">
                <span style="float:right; margin-right: 1%"><a href="{{ route('plot.index', $sector->projectid) }}"
                        class="btn" style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>
        <div class="container-fluid p-5">
            <form action="{{ route('plot.store', $sector->projectid) }}" method="post">
                @csrf
                <input type="hidden" name="sectormasterid" value={{ request()->route('sectormasterid') }} />
                <div class=" row my-3 col-10">
                    <label for="add" class="form-label"> Add plot number</label>
                    <div class="col-2">
                        <input type="number" name="strt" value="{{ old('strt') }}" class="form-control"
                            placeholder="Start Plot no" id="strt">
                        <span class="text-danger">
                            @error('strt')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger">
                            @error('plotnumber')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-2">
                        <input type="number" value="{{ old('end') }}" name="end" class="form-control"
                            placeholder="End Plot no" id="end">
                        <span class="text-danger">
                            @error('end')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger">
                            @error('plotnumber')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="area" class="form-label"> Area</label>
                    <input type="text" name="area" class="form-control" id="area" value="{{ old('area') }}">
                    <span class="text-danger">
                        @error('area')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                {{-- <div class="mb-3 col-1">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="Unsold">Unsold</option>
                        <option value="Sold">Sold</option>
                        <option value="Hold">Hold</option>
                    </select>
                    <span class="text-danger">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </span>
                </div> --}}
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var strtInput = document.getElementById('strt');
            var endInput = document.getElementById('end');

            strtInput.addEventListener('input', function() {
                var strtValue = parseFloat(strtInput.value);
                if (strtValue < 1) {
                    strtInput.value = 1;
                    strtValue = 1;
                }
                // Automatically adjust 'end' field to start with the next number of 'strt'
                // endInput.value = strtValue + 1;
            });

            endInput.addEventListener('input', function() {
                if (parseFloat(endInput.value) <= 1) {
                    endInput.value = 1;
                }
            });
            endInput.addEventListener('input', function() {
                var endValue = parseFloat(endInput.value);
                if (endValue < 1) {
                    endInput.value = 1;
                    endValue = 1;
                }

                // Ensure 'end' field cannot go less than 'strt'
                // var strtValue = parseFloat(strtInput.value);
                // if (endValue < strtValue) {
                //     endInput.value = strtValue;
                // }
            });
        });
    </script>
    <script>
        function updateSecondFieldConstraints() {
            const firstField = document.getElementById("strt");
            const secondField = document.getElementById("end");

            // Set the minimum value for the second field based on the value of the first field
            const minValue = parseInt(firstField.value, 10) + 1;
            secondField.min = minValue;

            // Validate the current value of the second field
            handleInput();
        }

        function handleInput() {
            const firstValue = parseInt(document.getElementById("firstField").value, 10);
            const secondField = document.getElementById("secondField");
            const currentValue = parseInt(secondField.value, 10);

            // Check if the input is a valid number
            if (!isNaN(currentValue)) {
                // Check if the new value is greater than or equal to the first value
                if (currentValue < firstValue) {
                    // If not, set the value to the minimum allowed value
                    secondField.value = firstValue + 1;
                }
            } else {
                // If not a valid number, set the value to the minimum allowed value
                secondField.value = firstValue + 1;
            }
        }
    </script>
@endsection
