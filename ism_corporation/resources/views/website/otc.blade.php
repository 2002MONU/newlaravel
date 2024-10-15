@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->product_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>OTC</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>products</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<!--otc heading start -->
<section class="otc-products">
    <div class="container">
        <H3 class=" mb-4">OTC</H3>
        <p>{{$site_setting->otc_title}}</p>
    </div>
</section>
<!- otc heading end-->
<section class="otc-products">
    <div class="container">
        <H3 class="text-center mb-4">PRODUCTS</H3>
        <div class="row justify-content-between ">
            @foreach ($otc_product as $product)
            <div class="col-lg-3 mt-3">
                <div class="products-p1">
                    <div class="pro-img">
                        <a href="#{{$product->name}}">
                            <img src="{{asset('assets/dynamics/product/'.$product->image)}}" alt="product">
                        </a>
                    </div>
                    <div class="product-name">
                        <a href="#{{$product->name}}"><h4>{{$product->name}}</h4></a>
                    </div>
                </div>
            </div>
            @endforeach
           
             
        </div>
    </div>
</section>
<section class="1-product">
    <div class="container">
        @foreach ($otc_product as $product)
         <div class="cvbb" id="{{$product->name}}">
            <div class="row align-items-center">
                <div class="col-lg-3 order-lg-0">
                    <div class="products-p1">
                        <div class="pro-img">
                            <a href="#pro1"><img src="{{asset('assets/dynamics/product/'.$product->image)}}" alt="product"></a>
                        </div>
                        <div class="product-name">
                            <a href="#pro1"><h4>{{$product->name}}</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-1">
                    <div class="pob-1" >
                        <h4 id="pro1">{{$product->name}}</h4>
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      
        
    </div>
</section>
@endsection