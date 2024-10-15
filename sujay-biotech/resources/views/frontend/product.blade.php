@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')

<!-- page header section start here -->
<section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('{{ asset('admin/breadcrumbImage/'.$breadcrumb->image) }}')">
    <div class="page-header-area">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-title">
                    <h2 class="text-white">Products</h2>
                </div>
                <ul class="breadcamp">
                    <li>
                        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a class="active">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- page header section ending here -->

<section class="campaign-section style-two style-three style-four padding-tb">
    <div class="container">
        <div class="section-wrapper">
            @foreach($products as $product)
                <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                    <div class="post-inner">
                        <div class="post-thumb">
                            <a href="{{ route('frontend.productdetail', $product->slug) }}">
                                <img src="{{ asset('admin/productImage/' . $product->image) }}" style="width: 100%; height: 350px;object-fit: cover" alt="{{ $product->title }}"></a>
                            <p>
                                <a href="{{ route('frontend.productdetail', $product->slug) }}"><i class="fas fa-link"></i></a>
                                <a href="{{ asset('admin/productImage/' . $product->image) }}" data-rel="lightcase"><i class="fab fa-searchengin"></i></a>
                            </p>
                        </div>
                        <div class="post-content">
                            <h5><a href="{{ route('frontend.productdetail', $product->slug) }}">{{ $product->title }}</a></h5>
                            <p class="mb-0">{{ Str::limit($product->description, 150) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>
    </div>
</section>

@endsection
