@extends('layouts.app')

@section('content')
    <div class="container">


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="project-tab" data-bs-toggle="tab" data-bs-target="#project" type="button"
                    role="tab" aria-controls="project" aria-selected="true">Project</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="sector-tab" data-bs-toggle="tab" data-bs-target="#sector" type="button"
                    role="tab" aria-controls="sector" aria-selected="false">Sector</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="plot-tab" data-bs-toggle="tab" data-bs-target="#plot" type="button"
                    role="tab" aria-controls="plot" aria-selected="false">Plot</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button"
                    role="tab" aria-controls="gallery" aria-selected="false">Gallery</button>
            </li>

        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="project" role="tabpanel" aria-labelledby="project-tab">

                @include('admin.project.single')


            </div>
            <div class="tab-pane fade" id="sector" role="tabpanel" aria-labelledby="sector-tab">

                @include('admin.sectormaster.index', ['sectors' => $sectors])

            </div>

            <div class="tab-pane fade" id="plot" role="tabpanel" aria-labelledby="plot-tab">

                @include('admin.plots.show', ['sectors' => $sectors])

            </div>

            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">

                @include('admin.projectgallery.index', ['galleries' => $galleries])

            </div>

        </div>

    </div>
@endsection
