 <!-- Footer Start -->
 <div class="container-fluid  text-body footer mt-5  pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row ps-2  gap-5 pe-5" >
            
            <div class="col-lg-2 col-md-6">
                <h3 class="text-light mb-2">Our Projects</h3>
                <a class="btn btn-link text-white" href="">Royal Dholera</a>
                <a class="btn btn-link" href="">Balaji Upvan</a>
                <a class="btn btn-link text-nowrap" href="">Royal Heritage City</a>
                <a class="btn btn-link text-nowrap" href="">Balaji 5Star Villa</a>
               
            </div>
            <div class="col-lg-2 col-md-6">
                <h3 class="text-light mb-2">Quick Links</h3>
                <a class="btn btn-link" href="{{Route('home.index')}}">Home</a>
                <a class="btn btn-link" href="{{Route('about')}}">About</a>
                <a class="btn btn-link" href="{{Route('projects')}}">Projects</a>
                <a class="btn btn-link" href="{{Route('gallery')}}">Gallery</a>
                <a class="btn btn-link" href="{{Route('contact')}}">Contact</a>
            </div>
            <div class="col-lg-3 col-md-6 me-5">
                <h3 class="text-white mb-2">Address</h3>
                <p class="mb-4 text-white">303 /312, Ashirvad Complex
                    near Prahladnagar Auda garden, Prahladnagar
                    Ahmedabad, Gujarat 380015</p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h3 class="text-white mb-2">CONTACT US!</h3>
                <a class="text-white text-nowrap mb-1 " href="mailto:info@jdinfraspacepvtltd.com"><i class="fa fa-envelope-open text-white me-1 "></i>info@jdinfraspacepvtltd.com</a>
                <div class="mb-2">
                    <a class=" text-white" href="tel:{{$topbars->contact1}}"><i class="fa fa-phone-alt text-white me-2"></i>{{$topbars->contact1}}</a>
            <div>
            <a class="text-white " href="tel:{{$topbars->contact2}}"><i class="fa fa-phone-alt text-white me-2"></i>{{$topbars->contact2}}</a>
            <div>
            <a class="text-white " href="tel:{{$topbars->contact3}}"><i class="fa fa-phone-alt text-white me-2"></i>{{$topbars->contact3}}</a>
        </div>
        </div>
            </div>
      
            <div class="d-flex pt-2">
 
                <a class="btn btn-square btn-outline-body me-1" href="{{$topbars->social_logo1}}"><img src="{{asset('templatevisitor/img/facebook.jpg')}}" style="width: 30px;" alt=""></a>
                <a class="btn btn-square btn-outline-body me-1" href="{{$topbars->social_logo2}}"><img src="{{asset('templatevisitor/img/youtube.jpg')}}" style="width: 30px;" alt=""></a>
                <a class="btn btn-square btn-outline-body me-1" href="https://wa.me/9537219999"><img src="{{asset('templatevisitor/img/whatsapp.jpg')}}" style="width: 30px;" alt=""></a>
                
                <a class="btn btn-square btn-outline-body me-0" href="{{$topbars->social_logo3}}"><img src="{{asset('templatevisitor/img/instagram.jpg')}}" style="width: 30px;" alt=""></a>
            </div>
            </div>
            
    <div class="container-fluid copyright">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">jdinfraspacepvtltd</a>, All Right Reserved.
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg border-1   btn-lg-square back-to-top" style=" border-color:white!important;background-color: #0b6ab2;"><i class="bi bi-arrow-up text-white"></i></a>