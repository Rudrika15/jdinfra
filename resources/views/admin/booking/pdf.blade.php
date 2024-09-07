<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




<style>
    .receipt {
        border: 3px solid;
        border-radius: 50px 0px 50px 0px;
        border-color: #552f04;
        background-color: #fef5eb;

        padding: 0.5rem;
    }

    .logo-column {
        display: flex;
        align-items: center;
        padding-left: 2rem;
    }

    .logo-column img {
        width: 150px;
    }

    .info-column {
        padding-left: 2rem;
    }

    .receipt-column {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 4rem;
    }

    .receipt-column h4,
    .receipt-column h6,
    .receipt-column h5 {
        margin: 0;
    }

    /* @media print {
        .no-print {
            display: none;
        }
    } */
</style>
<div class="container-fluid main">
    {{-- <button id="printButton" class="no-print">Print This Page</button> --}}


    <div class="container-fluid receipt">
        <div class="row">
            <div class="col-lg-3 logo-column">
                {{-- <img src="{{ asset('templatevisitor/logo.png') }}" alt="Logo" width="150px;"> --}}
                <img width="150px"
                    src="{{ url('/') }}/project-logo/{{ $installmentId->booking->plot->sector->project->logo }}"
                    alt="Logo">
            </div>
            <div class="col-lg-6">
                <div class="row d-flex flex-column">
                    <div class="col-lg-6 d-flex flex-column  align-items-center mb-3 mt-2">
                        <img src="{{ asset('templatevisitor/logo-1.png') }}" alt="Logo 1" width="400px;"
                            style="padding-left:250px;">
                    </div>

                    <div class="col-lg-6 info-column">
                        <p class="text-nowrap"><b>હેડ ઓફીસ:</b> 312, આશીર્વાદ કોમ્પ્લેક્ષ, કોર્પોરેટ રોડ, પ્રહલાદ નગર,
                            અમદાવાદ</p>
                        <p class="text-nowrap " style="padding-left:100px;"><i class="bi bi-telephone text-dark "></i>
                            +91 9537219999, 9574919999</p>
                    </div>
                </div>
            </div>


            {{-- @php
                use Carbon\Carbon;
            @endphp
            @php
                $today = Carbon::now()->format('d-m-Y');
            @endphp --}}


            <div class="col-lg-3 receipt-column">
                <h4>Receipt</h4>
                <h6>LLP ID NO: <b>abz-9305</b></h6>
                <h5>No: </h5>
                <h5>Date: {{ $installmentId->trans_date }} </h5>
            </div>
        </div>
    </div>

    <div class="container-fluid receipt " style="margin-top: 1rem;">
        <style>
            .col-lg-4 h4::after {
                content: "";
                display: block;

                height: 2px;
                background-color: #000;
                /* Adjust the background color as needed */
                margin-top: 0px;
                /* Adjust the margin-top for spacing if needed */
            }

            .second::after {
                content: "";
                display: block;

                height: 2px;
                background-color: #000;
                /* Adjust the background color as needed */
                margin-top: 5px;
                /* Adjust the margin-top for spacing if needed */
            }
        </style>
        <div class="row">
            <div class="col-lg-4 mt-2">
                <h5> Mr./Mrs :</h5>
                <h4 style="width: 1000px; padding-right:2px;"> {{ $installmentId->booking->fullname }}</h4>

            </div>

        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <h5>Membership No :</h5>
                <h4> {{ $installmentId->booking->membershipno }}</h4>
            </div>
            <div class="col-lg-4">
                <h5>From You Rs :</h5>
                <h4> {{ $installmentId->paid_amount }}</h4>
            </div>
            <div class="col-lg-4">
                <h5>Given By :</h5>
                <h4> {{ $installmentId->given_by }}</h4>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
                <h5>Rs In Words :</h5>
                <h4 class="second">{{ $installmentId->paid_amount }}</h4>
            </div>
            <div class="col-lg-6">
                <h5>Cash/Cheque/Draft No :</h5>
                <h4 class="second">
                    @if ($installmentId->booking->paymentmode == 'cheque' && isset($installmentId->booking->chequeno))
                        {{ $installmentId->booking->chequeno }}
                    @elseif ($installmentId->booking->paymentmode == 'upi' && isset($installmentId->booking->upi))
                        {{ $installmentId->booking->upi }}
                    @else
                        {{ $installmentId->paid_amount }}
                    @endif
                </h4>

            </div>

        </div>

        {{-- <div class="row mt-5">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-lg-6 second">
                    <h5 class="second">Rs In Words :</h5><h4 style="width: 1050px;"> Ruppes one lakh only</h4>
                </div>
                <div class="col-lg-6 second">
                    <h5 class="second">Cash/Cheque/Draft No :</h5><h4 style="width: 1050px;"> ABCDEFJ</h4>
                </div>
                
            </div>
          
        </div>
    </div>
   --}}
        <div class="row mt-2">
            <div class="col-lg-4">

            </div>
        </div>
        <style>
            .inline-h4 {
                display: inline-block;
                margin-right: 10px;
                /* Adjust margin as needed for spacing */
            }
        </style>

        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <h4 class="inline-h4">Installment No :</h4>
                    <h4 class="border border-2 inline-h4 d-flex align-items-center justify-content-center"
                        style="width:150px;height:40px;">{{ $installmentId->installment_no }}</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <h4 class="inline-h4">Plot Size :</h4>
                    <h4 class="border border-2 inline-h4 d-flex align-items-center justify-content-center"
                        style="width:150px;height:40px;">{{ $installmentId->booking->area }} </h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 d-flex align-items-center">
                <h4 class="border border-2" style=" width:200px;height:40px; padding: 5px; ">
                    <span style="background-color: black; color: white; padding: 2px; ">&#x20B9;</span>
                    {{ $installmentId->paid_amount }}
                </h4>

            </div>
            <div class="col-lg-6" style="padding-left: 300px;">
                <h4></h4>
                <h4 class="border border-2" style="width:150px ; height:150px;"> </h4>
            </div>
        </div>
    </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
