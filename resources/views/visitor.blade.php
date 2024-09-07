<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JD Infraspace Pvt Ltd</title>
    <link rel="icon" type="image/x-icon" href="{{asset('templatevisitor/img/favicon.ico')}}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    
    
    <link href="{{asset('templatevisitor/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('templatevisitor/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('templatevisitor/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" >

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('templatevisitor/css/bootstrap.min.css')}}" rel="stylesheet">
    


    <!-- Template Stylesheet -->
    <link href="{{asset('templatevisitor/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('templatevisitor/css/jquery.lightbox.css')}}" rel="stylesheet">
    <link href="{{asset('templatevisitor/css/jquery.lightbox.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('templatevisitor/wow-css/style.css')}}">
    <link rel="stylesheet" href="{{asset('templatevisitor/wow-css/preview.css')}}">
    <link rel="stylesheet" href="{{asset('templatevisitor/wow-css/wow_book.css')}}" type="text/css" />

    {{-- lightbox starts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    {{-- lightbox ends --}}

  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>

<body>
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative " style="width: 6rem; height: 6rem; color:#2f89c6;" role="status"></div>
        <img class="position-absolute top-50 start-50 translate-middle" src="{{asset('templatevisitor/img/logo.png')}}" width="70" alt="Icon">
    </div>
    <!-- Spinner End -->
    @include('visitor.layouts.topbar')
    @include('visitor.layouts.navbar')
    @yield('maincontain')

    @include('visitor.layouts.footer')
    



    <!-- JavaScript Libraries -->
    <script>
        $(document).ready(function(){
            $(".showbtn").click(function(){
                $("#showdiv").css('display','block');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('templatevisitor/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('templatevisitor/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('templatevisitor/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('templatevisitor/js/turn.js')}}"></script>


    {{-- lightbox starts --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

{{-- lightbox ends --}}


</body>

</html>