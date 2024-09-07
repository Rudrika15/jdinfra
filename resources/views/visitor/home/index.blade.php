@extends('visitor.layouts.visitor')

@section('maincontain')
    
   
    @include('visitor.home.slider')
    @include('visitor.home.facts')
    @include('visitor.home.team')
    @include('visitor.home.video')

    @include('visitor.home.about')
    @include('visitor.home.service')
    @include('visitor.home.feature')
    
    
    
    @include('visitor.home.testimonial')

    @include('visitor.home.youtube')
   
@endsection

    