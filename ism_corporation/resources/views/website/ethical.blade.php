@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->product_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Ethical</h2>
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
        <div class="row align-items-center mb-3">
            <div class="col-lg-12">
                <h2>Ethical</h2>
                <p>{{$site_setting->ethical_title}}</p>
            </div>
        </div>
        @foreach ($ethicals as $ethical)
          <div class="cvbb mt-5">
            <div class="row align-items-center">
                <div class="col-lg-3 order-lg-0">
                    <div class="products-p1">
                        <div class="pro-img">
                            <a href="#{{$ethical->name}}">
                                <img src="{{asset('assets/dynamics/product/'.$ethical->image)}}" alt="product">
                            </a>
                        </div>
                        <div class="product-name">
                              <a href="#{{$ethical->name}}">
                                    <h4>{{$ethical->name}}</h4>
                              </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-1">
                    <div class="pob-1" >
                        <h4 id="{{$ethical->name}}">{{$ethical->name}}</h4>
                        {!! $ethical->description !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
 </section>
@endsection