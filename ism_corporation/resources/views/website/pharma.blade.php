@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->product_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Pharmacovigilance</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
 <section class="who-we">   
   <!-- Project area -->
   <div class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="blog-details-wrap">
                        <div class="blog-details-img mb-4 mb-md-6">
                            <img src="{{asset('assets/dynamics/ourcompany/'.$pharma->image)}}" alt="Pharmacovigilance">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3>{{$pharma->title}}</h3>
                    {!! $pharma->description !!}
                </div>      
            </div>
        </div>
    </div>
 </section>
 <section class="key-elements">
    <div class="container">
        <div class="row">
            <div class="key-head text-center">
                <h3>Key Elements</h3>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($key_elements as $elements)
             <div class="col-lg-4">
                <div class="key1">
                    <a href="{{asset('assets/dynamics/ourcompany/'.$elements->document)}}">
                        <div class="key-img">
                            <img src="{{asset('assets/img/doc.png')}}" alt="img">
                            <h4>{{$elements->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
 </section>
@endsection