<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{Route('home.index')}}" class="navbar-brand ms-4 ms-lg-0" style="display: contents">
       <img class="me-3 p-2" src="{{asset('templatevisitor/img/logo.png')}}" style="width: 150px" alt="Icon">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{Route('home.index')}}"
            class="nav-item nav-link nav-link-fade-up  {{ Route::currentRouteNamed('home.index') ? 'active' : '' }}">
           Home
            </a>
            <a href="{{Route('about')}}" 
            class="nav-item nav-link nav-link-fade-up2 {{ Route::currentRouteNamed('about') ? 'active' : '' }}">
            About
        </a>
            <a href="{{Route('projects')}}"
            class="nav-item nav-link nav-link-fade-up3 {{ Route::currentRouteNamed('projects') ? 'active' : '' }}">
                Projects
            </a>
            <a href="{{Route('gallery')}}" 
            class="nav-item nav-link  nav-link-fade-up4 {{ Route::currentRouteNamed('gallery') ? 'active' : '' }}">
            Gallery
            </a>
            {{-- <a href="service.html" class="nav-item nav-link">Testimonials</a> --}}
            <a href="{{Route('contact')}}" 
            class="nav-item nav-link nav-link-fade-up5 {{ Route::currentRouteNamed('contact') ? 'active' : '' }}">
            Contact
            </a>
        
           
        </div>

    </div>
</nav>
<!-- Navbar End -->
