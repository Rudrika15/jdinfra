@extends('layouts.app')

@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-6">
                <h4 class="text-white">UPDATE &nbsp;-&nbsp; AGENT</h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <span style="float:right;"><a href="{{ route('admin.user.index') }}" class="btn"
                        style="background-color: #e3f2fd">Back</a></span>
            </div>
        </div>

        <div class="container-fluid p-5">

            <form action="{{ route('admin.user.updateuser', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col mb-3">
                        <label for="agentcode" class="form-label">Agent Code</label>
                        <input type="text" name="agentcode" value="{{ $user->agentcode }}" class="form-control"
                            id="title">
                        <span class="text-danger">
                            @error('agentcode')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">Agent Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            id="title">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control"
                            id="title">
                        <span class="text-danger">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="alternatemobile" class="form-label">Alternate Mobile</label>
                        <input type="text" name="alternatemobile" value="{{ $user->alternatemobile }}"
                            class="form-control">
                        <span class="text-danger">
                            @error('alternatemobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                            id="title">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="doctype" class="form-label">Select Id Proof</label>
                        <select name="doctype" class="form-select" id='id_card_type'>
                            <option value="Adhaar Card" {{ $user->doctype == 'Adhaar Card' ? 'selected' : '' }}>Adhaar Card
                            </option>
                            <option value="Pan Card" {{ $user->doctype == 'Pan Card' ? 'selected' : '' }}>Pan Card</option>
                            <option value="Driving License" {{ $user->doctype == 'Driving License' ? 'selected' : '' }}>
                                Driving License</option>
                            <option value="Voter Id" {{ $user->doctype == 'Voter Id' ? 'selected' : '' }}>Voter Id</option>
                        </select>
                        <span class="text-danger">
                            @error('doctype')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col mb-3">
                        <label for="docnumber" class="form-label">Documnet Number</label>
                        <input type="text" id='id_card_number' value="{{ $user->docnumber }}" name="docnumber"
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
                        <textarea name="address" value="" class="form-control" cols="30" rows="1">{{ $user->address }}</textarea>
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="usertype" class="form-label">User Type</label>
                        <select name="usertype" class="form-select" id="usertype">

                            <option value="Admin" disabled>Admin</option>
                            <option value="Agent" selected>Agent</option>

                        </select>
                        <span class="text-danger">
                            @error('usertype')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary shadow-none">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('id_card_type').addEventListener('change', function() {
            var selectedCardType = this.value;
            var idCardNumberInput = document.getElementById('id_card_number');

            // Reset validation attributes
            idCardNumberInput.removeAttribute('pattern');
            idCardNumberInput.removeAttribute('title');


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
