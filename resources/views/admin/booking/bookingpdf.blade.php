<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>

   
    <style>
        body {
            background-color: {{ $editor->body_color }};
        }



        .main {

            border: solid 5px;
            border-color: {{ $editor->border_color }};
            margin: 5px;
        }


        .passport {
            background-color: white;
            width: 160px;
            height: 200px;
            border-color: {{ $editor->border_color }} !important;

        }

        .member {
            background-color: white;
            width: 160px;
            height: 40px;
            border-color: {{ $editor->border_color }} !important;


        }

        .membershipform {
            color: white;
            background-color: {{ $editor->border_color }};
            width: 200px;
            height: 37px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px 0px 10px 0px;
        }

        .project {
            background-color: white;
            width: auto;
            height: 37px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px 20px 20px 20px;
            padding: 15px;
        }

        .client-info {
            border-color: {{ $editor->border_color }} !important;
            background-color: white;
            width: 95%;
            border-radius: 0px 50px 0px 50px;

        }

        .line {
            height: 2px;
            background-color: {{ $editor->border_color }};
            display: flex;

        }

        .border-bottom {
            border-color: {{ $editor->border_color }} !important;
            width: 900px;

        }

        .bordr {
            border-color: {{ $editor->border_color }} !important;

        }

        @media print {
            @page {
                margin: 0;
                /* Set margin to 0 for all sides */
            }
        }
    </style>

    <div class="main" style="margin-bottom: 100px;">
        <div class="container-fluid mt-2">
            <div class="mt-2 d-flex justify-content-center" style="gap:150px;">
                <div class="">શ્રી આશાપુરા માતાય નમ:</div>
                <div class="">|| શ્રી૧ |:||</div>
                <div class="">શ્રી અંબે માતાય નમ:</div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-end ps-3"><img src="{{ asset('templatevisitor/logo-1.png') }}"
                        alt="" width="100"></div>
                <div class="mt-3"><img
                        src="{{ url('/') }}/project-logo/{{ $bookings->plot->sector->project->logo }}"
                        alt="" width="300">
                </div>
                <div class="border border-2 passport mt-3 " style=""> </div>
            </div>
            <div class="address d-flex justify-content-between">
                <div class="ps-3">
                    <h6 class="mt-3" style="font-size: 10px;"><b>સાઈટ એડ્રેસ :</b>
                        {{ $bookings->plot->sector->project->location }} </h6>
                    <h6 class="mt-2" style="font-size: 10px;"><b>હેડ ઓફીસ:</b> 312 , આશીર્વાદ પારસ કોમ્પ્લેક્ષ ,
                        કોર્પોરેટ રોડ ,અમદાવાદ </h6>
                    <h6 class="mt-2" style="font-size: 10px;"><i class="bi bi-telephone"></i> +91 95372 19999 ,95749
                        19999,78745 69999 </h6>
                </div>
                <div class="text-center mt-3">
                    <h6>Membership No.</h6>
                    <div class="border border-2 member d-flex justify-content-center align-items-center" style="">
                        <h5 class="m-0">{{ $bookings->membershipno }}</h5>
                    </div>
                </div>
            </div>


            <div class="heading d-flex mt-2 ps-2">
                <div class="membershipform ">
                    <p class="m-0" style="font-size: 17px;"><b>MEMBERSHIP FORM</b></p>
                </div>
                <div class="project ms-3">
                    <p class="m-0" style="font-size: 17px;"><b>PROJECT NAME
                            :</b> {{ $bookings->plot->sector->project->title }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="border border-2 client-info p-3">
                <div class="d-flex">
                    <h6 class="text-nowrap">1.Full Name: </h6>
                    <h6 class="pb-2 border-1 border-bottom">&nbsp; {{ $bookings->fullname }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap">2.Father/Husband Name:</h6>
                    <h6 class="pb-2 border-1 border-bottom">&nbsp; {{ $bookings->fathername }}</h6>
                </div>

                <div class="d-flex">
                    <h6 class="text-nowrap">3.Address:</h6>
                    <h6 class="pb-2 border-1 border-bottom">&nbsp; {{ $bookings->address }}
                    </h6>
                </div>

                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">4.Date Of Birth :</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->dob }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">5.E-mail:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->email }}</h6>

                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">6. Aadhar Card No :</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->docnumber1 }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">7.Pan Card No:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->docnumber2 }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2 ">8.Mo:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->mobile }}</h6>
                    <h6 class="text-nowrap mt-2">9.Nominee Name :</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->nomineename }}</h6>


                </div>

                <div class="d-flex">
                    <h6 class="text-nowrap">10.Nominee Address:</h6>
                    <h6 class="pb-2 border-1 border-bottom">&nbsp; {{ $bookings->nomineeaddress }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">11. Relation with Member:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->relation }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">12.Nominee Mo:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->nomineemobile }}</h6>
                </div>
                <div class="d-flex">

                </div>
            </div>

        </div>
        <div class="heading d-flex mt-2 ps-4">
            <div class="membershipform ">
                <p class="m-0" style="font-size: 20px;"><b>OFFICE DETAILS</b></p>
            </div>

        </div>
        <div class="d-flex justify-content-center mt-3 mb-4 ">
            <div class="border border-2 client-info p-3">

                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">Cash/Cheque:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->paymentmode }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">Cheque No:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        @if ($bookings->chequeno)
                            &nbsp;{{ $bookings->chequeno }}
                        @endif
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ----
                    </h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">Date :</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->date }}</h6>

                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">Bank Name:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        @if ($bookings->bankname)
                            &nbsp;{{ $bookings->bankname }}
                        @endif
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp; ----
                    </h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">Plot Size:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->area }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap">Membership No :</h6>
                    <h6 class="pb-2 border-1 border-bottom">&nbsp; {{ $bookings->membershipno }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">Total Cost:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->sell_amount }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">No. Of EMI:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->emi }}</h6>
                </div>
                <div class="d-flex">
                    <h6 class="text-nowrap mt-2">Sales Partners Name:</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->user->name }}</h6>
                    <h6 class="text-nowrap mt-2 ps-3 ">Mobile No :</h6>
                    <h6 class="pb-2 border-1 border-bottom mt-2" style="width: 450px!important;">
                        &nbsp;{{ $bookings->user->mobile }}</h6>
                </div>

            </div>

        </div>

    </div>
    <div class="main">
        <div class="d-flex justify-content-center mt-3">
            <div class="border border-2 client-info p-3">
                <p>
                    • This Project Is Only For 4999 Members.
                    • Available Plot Size is 80 To 500 Sq. Yard
                    • 80 Sq. Yard = 1 Membership, So Membership Will Be Given In Multiple of 80 Sq. Yard
                    • Payment Condition: 3 Months, 42 Months And 84 Months... Monthly EMI Available.
                    • Lucky Draw: Every 3 Months At Diﬀerent Location as Per Company’s Convenience, Every Member Should
                    Be Present
                    At The Time of Lucky Draw or Lucky Draw Will Happen In Presence of Members Which Will Be Accepted By
                    All Members.
                    • All Members are Requested To Take Receipt of All of Their Payments From Sales Partner/Agent or
                    From Office.
                    • Dastavej Expenses, T.D.S., Vehicle Tax, Insurance etc. Not Included In Plot Cost And It Has To be
                    Paid Extra By Member.
                    • EMI Should Be Paid Before 10th Of Every Month, Either At Our Office Or To Our Sales Partner.
                    • Lowest Model of Gift Shown In Lucky Draw As Per Brochure Will Be Given.
                    • Member Who Win Main Gift In Lucky Draw Is Not Eligible For Any Other Draw And Remaining Payment of
                    Plot Has To Be Paid.
                    • Membership And Alloted Plot Will be Automatically Cancelled, if Member Fail To Pay 3 Continuous
                    EMI. No Refund Will Be Given in Any Circumstances.
                    • In Case of Cheque Return, Charges of Cheque Return has to Be Paid By Member.
                    • In This Project, Plot Will Be Given As Per Member Selection in Royal Heritage City.
                    • In Lucky Draw Beneﬁt, If Product Shown As Per Brochure is Not Available, Cash Amount Equal To That
                    Product Will beb Given.
                    • M/s. JD Infraspace India LLP Will Not be Responsible in case of Any Dispute Between The Member And
                    The Sales Partner.
                    • The Contents of This Brochure Are Purely Conceptual And Have No Legal Binding On the company.
                    • Members Shall Be Liable To Pay Maintenance Deposit Whatsoever Decided By The Developer.
                    • All Maters Are Subject To Ahmedabad Jurisdiction Only.

                </p>

            </div>

        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="border mb-3 border-2 client-info p-3 d-flex  align-items-end justify-content-between "
                style="margin-top: 325px; height:200px;">
                <div>
                    <h6>Date : 05/03/2024</h6>

                </div>
                <div>
                    <h6 class="border-2 border-top bordr"> MEMBER'S SIGN</h6>

                </div>
                <div class="border-2 border-top bordr">
                    <h6>SALES PARTNERS SIGN</h6>

                </div>
            </div>

        </div>

    </div>
</body>

</html>
