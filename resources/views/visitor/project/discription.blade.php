 {{-- discription section --}}
 <style>
     .tab button.active {

         color: #fff;
         /* Set active text color to white */
     }
 </style>
 <div class="container-fluid d-flex justify-content-center mb-2 mt-5 wow fadeInUp" data-wow-delay="0.1s">
     <div class="row d-flex justify-content-center">
         <div class="col-lg-12">
             <h1 class="section-title" style="font-size: 60px;">{{ $project->title ?? '-' }}</h1>
         </div>
     </div>



 </div>
 <div class="container-fluid wow fadeInUp d-flex " data-wow-delay="0.1s">

     <div class="tab">
         <button class="tablinks  active" onclick="openCity(event, 'Specifications')" id="defaultOpen">About
             Project</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Aminities')">Aminities</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Prices')">Prices</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Location')">Location</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Layout Plan')">Layout Plan</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Gallery')">Gallery</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Location Map')">Location Map</button>
         <button class="tablinks arrow-right active" onclick="openCity(event, 'Download')"
             id="downloadButton">Download</button>
     </div>
     @include('visitor.project.Aboutproject')
     @include('visitor.project.aminities')
     @include('visitor.project.prices')
     @include('visitor.project.location')
     @include('visitor.project.layout')
     @include('visitor.project.gallery')

     @include('visitor.project.locationmap')
     @include('visitor.project.download')
 </div>

 {{-- discription section --}}
