@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
    <!-- page header section start here -->
    <section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('admin/categoryImage/'.$categories->image_2) }}'); background-repeat: no-repeat; background-size: cover;">

        <div class="page-header-area">
            <div class="container">
                <div class="page-header-content">
                    <div class="page-header-title">
                        <h2 class="text-white">{{ $categories->name }}</h2>
                    </div>
                    <ul class="breadcamp">
                        <li>
                            <a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                       
                        <li>
                            <a class="active">{{ $categories->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- page header section ending here -->


    <section class="feature-section style-three padding-tb" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                     <p>{!! $categories->description !!}

</p>
                </div><!--col-md-10-->
            </div><!--row-->
        </div><!--container-->
    </section><!--airoc-abut-->

    <section class="campaign-section style-two style-three style-four padding-tb">
        <div class="container">
            <div class="section-wrapper">
                @foreach($products as $product)
                    <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('frontend.productdetail', $product->slug) }}">
                                    <img src="{{ asset('admin/productImage/' . $product->image) }}" alt="{{ $product->title }}">
                                </a>
                                <p>
                                    <a href="{{ route('frontend.productdetail', $product->slug) }}"><i class="fas fa-link"></i></a>
                                    <a href="{{ asset('admin/productImage/' . $product->image) }}" data-rel="lightcase"><i class="fab fa-searchengin"></i></a>
                                </p>
                            </div>
                            <div class="post-content">
                                <h5><a href="{{ route('frontend.productdetail', $product->slug) }}">{{ $product->title }}</a></h5>
                                <p class="mb-0">{{ $product->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul class="pagination" data-aos="fade-up" data-aos-duration="700">
                {{ $products->links() }}
            </ul>
        </div>
    </section>
    


@endsection