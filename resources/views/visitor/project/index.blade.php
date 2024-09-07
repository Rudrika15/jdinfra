@extends('layouts.visitor')

@section('maincontain')
    
   
    @include('visitor.home.slider')
    @include('visitor.home.facts')
    @include('visitor.home.team')
    @include('visitor.home.youtube')
    @include('visitor.home.about')
    @include('visitor.home.service')
    @include('visitor.home.feature')
    @include('visitor.home.project')
    
    @include('visitor.home.appoinment')
    @include('visitor.home.testimonial')

    
    @include('layouts.footer')
@endsection

    