
@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')

<!-- page header section start here -->
<section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('{{ asset('frontend/assets/images/breadcrumb-img.png') }}')">
    <div class="page-header-area">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-title">
                    <h2 class="text-white">Product View</h2>
                </div>
                <ul class="breadcamp">
                    <li>
                        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a class="active">Product View</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- page header section ending here -->

<section class="campaign-section style-two style-three style-four padding-tb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 product-view-img">
                <a data-rel="lightcase" href="{{ asset('admin/productImage/' . $product->image) }}">
                    <img src="{{ asset('admin/productImage/' . $product->image) }}" alt="{{ $product->title }}">
                </a>
            </div>
            <div class="col-md-6">
                <h4>{{ $product->title }}</h4>
                <p>{{ $product->description }}</p>
                
                <h4>Features</h4>
                {!! $product->features !!}

                <ul class="enquiry-btns">
                    <li>
                        <a href="tel:{{$product->phone}}" class="custom-btn"><i class="fas fa-phone "></i> Enquiry Now</a>
                    </li>
                    <li>
                        <a class="whatsapp-btn" href="https://api.whatsapp.com/send?phone=+91123344556"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="table-responsive custom-table-data">
                    <h3 class="mb-4">Specification - Imidacloprid {{ $product->soluable_concentrate }}SL
                    {!! $product->specification !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- related products section start -->
<section class="campaign-section style-two padding-tb">
    <div class="container">
        <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2>Related Products</h2>
        </div>
        <div class="section-wrapper" data-aos="fade-up" data-aos-duration="700">
            <div class="campaign-slider-two">
                <div class="swiper-wrapper">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="swiper-slide">
                            <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{ route('frontend.productdetail', $relatedProduct->slug) }}">
                                            <img src="{{ asset('admin/productImage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->title }}">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h5><a href="{{ route('frontend.productdetail', $relatedProduct->slug) }}">{{ $relatedProduct->title }}</a></h5>
                                        <p class="mb-0">{{ Str::limit($relatedProduct->description, 100) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="campaign-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- related products section ending here -->

@endsection







