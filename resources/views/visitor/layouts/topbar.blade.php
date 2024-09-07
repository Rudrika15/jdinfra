
        <!-- Topbar Start -->
        <div class="container-fluid  p-0 wow fadeIn" style="background-color:#0b6ab2;" data-wow-delay="0.1s">
            <div class="row gx-0 d-none d-lg-flex">
                <div class="col-lg-8  ps-4 text-start">
                    <div class="h-100 d-flex gap-2 align-items-center py-3 me-3">
                        <a class=" text-white" href="tel:{{$topbars->contact1}}"><i class="fa fa-phone-alt text-white me-2"></i>{{$topbars->contact1}} |</a>
                        <a class="text-white " href="tel:{{$topbars->contact2}}">{{$topbars->contact2}} |</a>
                        <a class="text-white " href="tel:{{$topbars->contact3}}">{{$topbars->contact3}} |</a>
                        <a class="text-white " href="mailto:{{$topbars->email}}"><i class="fa fa-envelope-open text-white me-2"></i>{{$topbars->email}}</a>
                    </div>
                </div>
                <div class="col-lg-4 px-5 text-end">
                    
                    <div class="h-100 d-inline-flex align-items-center">
                        <a class="btn btn-sm-square btn-outline-body me-1 text-white" href="{{$topbars->social_logo1}}"><img src="{{asset('templatevisitor/img/facebook.jpg')}}" style="width: 30px;" alt=""></a>
                        <a class="btn btn-sm-square btn-outline-body me-1 text-white" href="{{$topbars->social_logo2}}"><img src="{{asset('templatevisitor/img/youtube.jpg')}}" style="width: 30px;" alt=""></a>
                        <a class="btn btn-sm-square btn-outline-body me-1 text-white" href="https://wa.me/9537219999"><img src="{{asset('templatevisitor/img/whatsapp.jpg')}}" style="width: 30px;" alt=""></a>
                       
                        <a class="btn btn-sm-square btn-outline-body me-0 text-white" href="{{$topbars->social_logo3}}"><img src="{{asset('templatevisitor/img/instagram.jpg')}}" style="width: 30px;" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->