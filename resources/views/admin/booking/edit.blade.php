@extends('layouts.app')
@section('content')
    <div class="container-fluid border border p-0 m-0">
        <div class="row m-0 p-3" style="background-color: #0b6ab2">
            <div class="col-lg-9">
                <h2 class="text-white">UPDATE &nbsp;-&nbsp; BOOKING OF {{ $booking->plot->sector->project->title }} SECTOR OF
                    {{ $booking->plot->sector->sectorname }} PLOT
                    {{ $booking->plot->plotnumber }}</h2>
            </div>
            <div class="col-lg-3 d-flex justify-content-end align-items-center">
                <span><a href="{{ route('admin.booking.viewbooking', $booking->plot->sector->project->id) }}" class="btn"
                        style="background-color: #e3f2fd">
                        Back</a></span>
            </div>
        </div>
        <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="plotid" value="{{ $booking->plot->id }}">
            <input type="hidden" name="plotnumber" value="{{ $booking->plot->plotnumber }}">
            <div class="container-fluid p-5">
                <h3 class="text-center mb-5">Membership Form</h3>
                <div class="row">
                    <div class="col mb-3">
                        <label for="membershipno" class="form-label">Membership No</label>
                        <input type="text" class="form-control" value="{{ $booking->membershipno }}" name="membershipno"
                            id="membershipno1" onchange="getmembershipno(this)">
                        <span class="text-danger">
                            @error('membershipno')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" value="{{ $booking->fullname }}" name="fullname" class="form-control">
                        <span class="text-danger">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="fathername" class="form-label">Father/Husband Name</label>
                        <input type="text" value="{{ $booking->fathername }}" name="fathername" class="form-control">
                        <span class="text-danger">
                            @error('fathername')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="row">

                    <div class="col mb-3">
                        <label for="dob" class="form-label">Date Of Birth</label>
                        <input type="date" value="{{ $booking->dob }}" name="dob" class="form-control">
                        <span class="text-danger">
                            @error('dob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" value="{{ $booking->email }}" name="email" class="form-control">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" value="{{ $booking->mobile }}" name="mobile" class="form-control">
                        <span class="text-danger">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea value="{{ $booking->address }}" name="address" class="form-control">{{ $booking->address }} </textarea>
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="doctype1" class="form-label">Select Id Proof-1</label>
                        <select name="doctype1" class="form-select" id="id_card_type_1">
                            <option value="">Select Id Proof Type</option>
                            <option value="Adhaar Card" {{ $booking->doctype1 == 'Adhaar Card' ? 'selected' : '' }}>
                                Adhaar Card</option>
                            <option value="Pan Card" {{ $booking->doctype1 == 'Pan Card' ? 'selected' : '' }}>Pan Card
                            </option>
                            <option value="Driving License"
                                {{ $booking->doctype1 == 'Driving License' ? 'selected' : '' }}>Driving License
                            </option>
                            <option value="Voter Id" {{ $booking->doctype1 == 'Voter Id' ? 'selected' : '' }}>Voter Id
                            </option>
                        </select>
                        <span class="text-danger">
                            @error('doctype1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col mb-3">
                        <label for="docnumber1" class="form-label">Documnet Number</label>
                        <input type="text" id="id_card_number_1" value="{{ $booking->docnumber1 }}" name="docnumber1"
                            class="form-control">
                        <span class="text-danger">
                            @error('docnumber1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="doctype2" class="form-label">Select Id Proof-2</label>
                        <select name="doctype2" class="form-select" id="id_card_type_2">
                            <option value="">Select Id Proof Type</option>
                            <option value="Adhaar Card " {{ $booking->doctype2 == 'Adhaar Card' ? 'selected' : '' }}>
                                Adhaar Card</option>
                            <option value="Pan Card"{{ $booking->doctype2 == 'Pan Card' ? 'selected' : '' }}>Pan Card
                            </option>
                            <option
                                value="Driving License"{{ $booking->doctype2 == 'Driving License' ? 'selected' : '' }}>
                                Driving License</option>
                            <option value="Voter Id" {{ $booking->doctype2 == 'Voter Id' ? 'selected' : '' }}>Voter Id
                            </option>
                        </select>
                        <span class="text-danger">
                            @error('doctype2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col mb-3">
                        <label for="docnumber2" class="form-label">Documnet Number</label>
                        <input type="text" id="id_card_number_2" value="{{ $booking->docnumber2 }}"
                            name="docnumber2" class="form-control">
                        <span class="text-danger">
                            @error('docnumber2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nomineename" class="form-label">Nominee Name</label>
                        <input type="text" value="{{ $booking->nomineename }}" name="nomineename"
                            class="form-control">
                        <span class="text-danger">
                            @error('nomineename')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="relation" class="form-label">Relation With Member</label>
                        <input type="text" value="{{ $booking->relation }}" name="relation" class="form-control">
                        <span class="text-danger">
                            @error('relation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="nomineemobile" class="form-label">Nominee Mobile</label>
                        <input type="text" value="{{ $booking->nomineemobile }}" name="nomineemobile"
                            class="form-control">
                        <span class="text-danger">
                            @error('nomineemobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="col mb-3">
                    <label for="nomineeaddress" class="form-label">Nominee address</label>
                    <textarea type="text" value="{{ $booking->nomineeaddress }}" name="nomineeaddress" class="form-control"> {{ $booking->nomineeaddress }} </textarea>
                    <span class="text-danger">
                        @error('nomineeaddress')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <div class="container-fluid p-5">
                <h3 class="text-center mb-5 "> Office Details </h3>
                <div class="row">
                    <div class="col mb-3">
                        <label for="paymentmode" class="form-label">Payment Method</label>
                        <select id="paymentmode" name="paymentmode" class="form-select">
                            <option value="" selected disabled>Select payment method</option>
                            <option value="cash" {{ $booking->paymentmode == 'cash' ? 'selected' : '' }}>Cash
                            </option>
                            <option value="cheque" {{ $booking->paymentmode == 'cheque' ? 'selected' : '' }}>cheque
                            </option>
                            <option value="upi" {{ $booking->paymentmode == 'upi' ? 'selected' : '' }}>upi</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" value="{{ $booking->date }}" class="form-control" name="date"
                            id="date">
                        <span class="text-danger">
                            @error('date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-group mb-3" id="check_number_field"
                            @error('chequeno') style="display: block;" @else style="display: none;" @enderror>
                            <label for="chequeno" class="form-label">Cheque Number</label>
                            <input type="text" id="chequeno" name="chequeno" value="{{ $booking->chequeno }}"
                                class="form-control" @if (old('paymentmode') === 'cheque')  @endif>
                            <span id="chequeno-error" class="text-danger"></span>
                        </div>
                        <div class="form-group" id="bank_name_field"
                            @error('bankname') style="display: block;" @else style="display: none;" @enderror>
                            <label for="bankname" class="form-label"> Bank Name </label>
                            <input type="text" class="form-control" name="bankname" id="bankname"
                                value="{{ $booking->bankname }}">
                            <span id="bankname-error" class="text-danger"></span>
                        </div>
                        <div class="form-group" id="upi_field"
                            @error('upi') style="display: block;" @else style="display: none;" @enderror>
                            <label for="upi_id" class="form-label"> UPI</label>
                            <input type="text" class="form-control" name="upi" id="upi_id"
                                value="{{ $booking->upi }}" @if (old('paymentmode') === 'upi')  @endif>
                            <span id="upi-error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="agent" class="form-label"> Sales Partner Name </label>
                        <input type="text" class="form-control" value="{{ $booking->user->name }}" name="agent"
                            id="agent" disabled>
                        <span class="text-danger">
                            @error('agent')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="agentmobile" class="form-label">Agent Mobile </label>
                        <input type="text" class="form-control" value="{{ $booking->agentmobile }}"
                            name="agentmobile" id="agentmobile" disabled>
                        <span class="text-danger">
                            @error('agentmobile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="area" class="form-label"> Plot Size </label>
                        <input type="text" class="form-control" value="{{ $booking->plot->area }}" name="area"
                            id="area" readonly>
                        <span class="text-danger">
                            @error('area')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="booking_amount" class="form-label">Booking Amount</label>
                        <input type="text" value="{{ $booking->booking_amount }}" class="form-control"
                            name="booking_amount" id="booking_amount">
                        <span class="text-danger">
                            @error('booking_amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    @if (Auth::user()->usertype == 'admin')
                        <div class="col mb-3">
                            <label for="agent_commisson" class="form-label">Agent Commission</label>
                            <select name="agent_commisson" class="form-select" id="">
                                @for ($i = 1; $i <= 25; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                            <span class="text-danger">
                                @error('agent_commisson')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    @endif
                    <div class="col mb-3">
                        <label for="sell_amount" class="form-label">Total Cost</label>
                        <input type="text" value="{{ $booking->sell_amount }}" class="form-control"
                            name="sell_amount" id="sell_amount">
                        <span class="text-danger">
                            @error('sell_amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="emi" class="form-label">No Of Emi</label>
                        <input type="number" value="{{ $booking->emi }}" class="form-control" name="emi"
                            id="emi">
                        <span class="text-danger">
                            @error('emi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" value="{{ $booking->remarks }}" name="remarks" id="" cols="10"
                            rows="5">{{ $booking->remarks }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center m-3">
                <button type="submit" class="btn btn-primary shadow-none">Update</button>
            </div>

        </form>


    </div>
    </div>
    <script>
        function updateValidation(selectedCardType, idCardNumberInput) {
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
                idCardNumberInput.setAttribute('pattern', '[a-zA-Z]{5}[0-9]{4}[A-Z]{1}');
                idCardNumberInput.setAttribute('title', 'PAN card number should be in the format ABCDE1234F');
                idCardNumberInput.placeholder = 'Enter PAN card number';
            } else if (selectedCardType === 'Voter Id') {
                idCardNumberInput.setAttribute('pattern', '[a-zA-Z]{3}[0-9]{7}');
                idCardNumberInput.setAttribute('title', 'Voter ID card number should be in the format ABC1234567');
                idCardNumberInput.placeholder = 'Enter Voter ID card number';
            } else if (selectedCardType === 'Driving License') {
                idCardNumberInput.setAttribute('pattern', '[a-zA-Z ,]{2}[0-9]{13}');
                idCardNumberInput.setAttribute('title', 'Driving License number should be in a specific format');
                idCardNumberInput.placeholder = 'Enter Driving License number';
            }

        }

        document.getElementById('id_card_type_1').addEventListener('change', function() {
            var selectedCardType = this.value;
            var idCardNumberInput = document.getElementById('id_card_number_1');
            updateValidation(selectedCardType, idCardNumberInput);
        });

        document.getElementById('id_card_type_2').addEventListener('change', function() {
            var selectedCardType = this.value;
            var idCardNumberInput = document.getElementById('id_card_number_2');
            updateValidation(selectedCardType, idCardNumberInput);
        });
        // new doc

        $(document).ready(function() {
            function handleIdProofValidation() {
                var doctype1Value = $('#id_card_type_1').val();
                var doctype2Value = $('#id_card_type_2').val();

                // Clear previous validation messages
                $('#id_card_type_1-error').text('');
                $('#id_card_type_2-error').text('');

                // Validation for doctype1
                if (doctype1Value !== '' && doctype1Value === doctype2Value) {
                    // If doctype1 and doctype2 have the same value, display an error message
                    $('#id_card_type_1-error').text('Selected value is not allowed for ID Proof-2');
                } else {
                    // Clear the error message
                    $('#id_card_type_1-error').text('');
                }

                // Validation for doctype2
                if (doctype2Value !== '' && doctype1Value === doctype2Value) {
                    // If doctype1 and doctype2 have the same value, display an error message
                    $('#id_card_type_2-error').text('Selected value is not allowed for ID Proof-2');
                } else {
                    // Clear the error message
                    $('#id_card_type_2-error').text('');
                }
            }

            // Call the function on page load
            handleIdProofValidation();

            // Attach change event handlers to the document type selects
            $('#id_card_type_1').change(handleIdProofValidation);
            $('#id_card_type_2').change(handleIdProofValidation);
        });


        function getmembershipno() {
            let text1 = document.getElementById('membershipno1').value;
            document.getElementById('custmembershipno').value = text1;

        }

        $(document).ready(function() {
            // Handle change event on the select element
            $('#agent').on('change', function() {
                // Get the selected option
                var selectedOption = $(this).find(':selected');
                // Get the mobile value from the selected option's data attribute
                var mobileValue = selectedOption.data('mobile');
                // Update the value of the agentmobile input
                $('#agentmobile').val(mobileValue);
            });
        });
        // Update check number field visibility and required attribute on payment method change
        $('#paymentmode').change(function() {
            var selectedpaymentmode = $(this).val();
            if (selectedpaymentmode === 'cheque') {
                $('#check_number_field').show();
                $('#check_number').attr('required', true);
                $('#bank_name_field').show();
                $('#bankname').attr('required', true);

            } else {
                $('#check_number_field').hide();
                $('#check_number').prop('required', false);
                $('#bank_name_field').hide();
                $('#bankname').prop('required', false);

            }
            if (selectedpaymentmode === 'upi') {
                $('#upi_field').show();
                $('#upi_id').attr('required', true);

            } else {
                $('#upi_field').hide();
                $('#upi_id').prop('required', false);

            }

        });

        $(document).ready(function() {
            if ($('#paymentmode').val() === 'cheque') {
                // Show the cheque number field
                $('#check_number_field').show();



                // Manually trigger the validation error if the cheque number is empty
                if ($('#chequeno').val() === '') {
                    $('#chequeno-error').text('The Cheque Number field is required.');
                } else {
                    $('#chequeno-error').text('');
                }
            } else {
                // If 'cheque' is not selected, hide the cheque number field
                $('#check_number_field').hide();


                // Clear the validation error message
                $('#chequeno-error').text('');
            }
            $(document).ready(function() {
                $('#chequeno').on('input', function(e) {
                    // Check if 'cheque' is selected
                    if ($('#paymentmode').val() === 'cheque') {
                        // Get the value of the cheque number
                        var chequenoValue = $('#chequeno').val();

                        // Check if it's less than 6 digits
                        if (chequenoValue.length !== 6) {
                            // Prevent form submission
                            e.preventDefault();

                            // Display an error message
                            $('#chequeno-error').text(
                                'The Cheque Number must be at least 6 digits.');
                        } else {
                            // Clear the error message
                            $('#chequeno-error').text('');
                        }
                    }
                });
            });
            $(document).ready(function() {
                if ($('#paymentmode').val() === 'cheque') {
                    // Show the cheque number field
                    $('#bank_name_field').show();
                    // Mark the cheque number field as required
                    $('#bankname').prop('required', true);
                    // Manually trigger the validation error if the cheque number is empty
                    if ($('#bankname').val() === '') {
                        $('#bankname-error').text('The bank Number field is required.');
                    } else {
                        $('#bankname-error').text('');
                    }
                } else {
                    // If 'cheque' is not selected, hide the cheque number field
                    $('#bank_name_field').hide();
                    // Remove the 'required' attribute
                    $('#bankname').prop('required', false);
                    // Clear the validation error message
                    $('#bankname-error').text('');
                }
            });
        });
        $(document).ready(function() {
            if ($('#paymentmode').val() === 'upi') {
                // Show the cheque number field
                $('#upi_field').show();
                // Mark the cheque number field as required
                $('#upi_id').prop('required', true);
                // Manually trigger the validation error if the cheque number is empty


                if ($('#upi_id').val().length >= 8) {
                    $('#upi-error').text('');
                } else {
                    $('#upi-error').text('Invalid UPI');
                }

            } else {
                // If 'cheque' is not selected, hide the cheque number field
                $('#upi_field').hide();
                // Remove the 'required' attribute

                // Clear the validation error message
                $('#upi-error').text('');
            }
        });
    </script>
@endsection
