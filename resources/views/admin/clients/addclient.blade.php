@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-3 g-5">
            <span>Add Client</span>
            <span style="float:right; padding-left:44px"><a href="{{ route('admin.user.viewclient') }}"
                    class="btn btn-primary">view Client</a></span>
            <span style="float:right; padding-left:44px"><a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go To
                    Dashboard</a></span>
        </div>
        <form action="{{ route('store.client') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Client Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="title">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="{{ old('email') }}" name="email" class="form-control" id="title">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" value="{{ old('mobile') }}" name="mobile" class="form-control" id="title">
                    <span class="text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="alternatemobile" class="form-label">Alternate Mobile</label>
                    <input type="text" value="{{ old('alternatemobile') }}" name="alternatemobile" class="form-control">
                    <span class="text-danger">
                        @error('alternatemobile')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                        id="title">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>



            <div class="row">
                <div class="col mb-3">
                    <label for="doctype" class="form-label">Select Id Proof</label>
                    <select name="doctype" class="form-control" id="id_card_type">
                        <option value="">Select Id Proof Type</option>
                        <option value="Adhaar Card">Adhaar Card</option>
                        <option value="Pan Card">Pan Card</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Voter Id">Voter Id</option>
                    </select>
                    <span class="text-danger">
                        @error('doctype')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col mb-3">
                    <label for="docnumber" class="form-label">Documnet Number</label>
                    <input type="text" id="id_card_number" value="{{ old('docnumber') }}" name="docnumber"
                        class="form-control">
                    <span class="text-danger">
                        @error('docnumber')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" cols="30" rows="1">{{ old('address') }}</textarea>
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" value="{{ old('city') }}" name="city" class="form-control" id="title">
                    <span class="text-danger">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        document.getElementById('id_card_type').addEventListener('change', function() {
            var selectedCardType = this.value;
            var idCardNumberInput = document.getElementById('id_card_number');

            // Reset validation attributes
            idCardNumberInput.removeAttribute('pattern');
            idCardNumberInput.removeAttribute('title');
            idCardNumberInput.value = '';

            // Apply validation based on the selected ID card type
            if (selectedCardType === 'Adhaar Card') {
                idCardNumberInput.setAttribute('pattern', '\\d{12}');
                idCardNumberInput.setAttribute('title', 'Aadhaar card number must be 12 digits');
                idCardNumberInput.placeholder = 'Enter Aadhaar card number';
            } else if (selectedCardType === 'Pan Card') {
                idCardNumberInput.setAttribute('pattern', '[a-z,A-Z]{5}[0-9]{4}[A-Z]{1}');
                idCardNumberInput.setAttribute('title', 'PAN card number should be in the format ABCDE1234F');
                idCardNumberInput.placeholder = 'Enter PAN card number';
            } else if (selectedCardType === 'Voter Id') {
                idCardNumberInput.setAttribute('pattern', '[a-z,A-Z]{3}[0-9]{7}');
                idCardNumberInput.setAttribute('title', 'Voter ID card number should be in the format ABC1234567');
                idCardNumberInput.placeholder = 'Enter Voter ID card number';
            } else if (selectedCardType === 'Driving License') {
                idCardNumberInput.setAttribute('pattern', '[a-z , A-Z]{2}[0-9]{13}');
                idCardNumberInput.setAttribute('title', 'Driving License number should be in a specific format');
                idCardNumberInput.placeholder = 'Enter Driving License number';
            }
            // Add similar logic for other ID card types
        });
    </script>
@endsection
