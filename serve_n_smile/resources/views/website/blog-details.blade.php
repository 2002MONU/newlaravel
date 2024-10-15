@extends('website.layouts.app')
@section('mainwebsite')
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->blog_banner)}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>Blog Page</h1>
                    <ul>
                        <li>
                            <a href="{{route('home.index')}}">Home</a>
                        </li>
                        
                        <li>
                            Blog
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
<!-- Blog Area Start Here -->

<!-- About Us Area Start Here -->
<section class="section-padding-md-5">
    <div class="container">
        <div class="row">
           
            
            <div class="col-lg-12">
                <div class="about-box-layout7">
                    <div class="item-popup-img">
                        <img src="{{asset('assets/dynamics/'.$blog->image)}}" alt="Thumb">
                       
                    </div>
                    <div class="about-box-layout7">
                        <div class="top-left-item">
                            <h2 class="item-title">{{$blog->title}} </h2>
                            <p>{{ $blog->description }}</p>
                            {!! $blog->blog_description !!}
                        </div>
                    </div>
                </div>
            </div>
            
         <div class="action-area">
    @if($previousBlog)
        <a href="{{ route('home.blog-details', $previousBlog->slug) }}" class="btn-fill-previous bg-accent btn-slide-hover text-primarytext mr-50">
            <i class="fas fa-angle-left"></i> Previous
        </a>
    @else
        <!-- Optionally, you can display a disabled button or nothing -->
        <a class="btn-fill-previous bg-accent btn-slide-hover text-primarytext mr-50 disabled">
            <i class="fas fa-angle-left"></i> Previous
        </a>
    @endif
</div>

<div class="action-area">
    @if($nextBlog)
        <a href="{{ route('home.blog-details', $nextBlog->slug) }}" class="btn-fill-next bg-accent btn-slide-hover text-primarytext">
            Next <i class="fas fa-angle-right"></i>
        </a>
    @else
        <!-- Optionally, you can display a disabled button or nothing -->
        <a class="btn-fill-next bg-accent btn-slide-hover text-primarytext disabled">
            Next <i class="fas fa-angle-right"></i>
        </a>
    @endif
</div>

        </div>
    </div>
</section>
<!-- About Us Area End Here -->
<!-- About Us Area End Here -->
<!-- Blog Area End Here -->
@endsection