@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->product_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Institutional</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>products</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<section class="who-we">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="who-img">
                    <img src="{{asset('assets/dynamics/product/'.$insti->image)}}" alt="product">
                </div>
            </div>
            <div class="col-lg-6">
                <h2>{{$insti->title}}</h2>
                {!! $insti->description !!}
            </div>
        </div>
    </div>
 </section>
@endsection