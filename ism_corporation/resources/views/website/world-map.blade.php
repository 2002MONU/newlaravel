@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->export_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>World Map</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>world map</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
 <section class="our-world">
    <div class="container">
        <div class="world-text">
          {!! $export->description !!}
        </div>
        <div class="map-img mt-5">
            <img src="{{asset('assets/dynamics/product/'.$export->image)}}" alt="world-map">
        </div>
    </div>
 </section>
@endsection