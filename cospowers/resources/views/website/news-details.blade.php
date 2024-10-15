 
 @extends('website.layouts.app')
 @section('mainwebsite')
 <!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->news_banner)}})">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="breadcrumb-content text-center">
                    <h2>{{$news->title}}</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Home</a></li>
                        <li>{{$news->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- blog details -->
<div class="blog-details">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-3">
                <div class="sidebar">
                
                    <div class="sidebar-widget">
                        <div class="recent-blog">
                            <h4 class="title">Recent Post</h4>
                            @foreach ($news_details as $news)
                             <div class="single-blog">
                                <div class="part-img">
                                    <img src="{{asset('assets/dynamics/'.$news->image)}}" alt="image">
                                </div>
                                <div class="part-text">
                                    <span class="date">{{$news->updated_at->format('d.m.Y')}}</span>
                                    <p>{{$news->title}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                     
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="blog-details-area">
                    <div class="part-img">
                        <img src="{{asset('assets/dynamics/'.$news->image)}}" alt="news-image">
                    </div>
                    <div class="part-body">
                        <div class="blog-head">
                            <h2>{{$news->title}}</h2>
                            <div class="user">
                                <img src="assets/img/admin-profile.png" alt="">
                                <span class="name">{{$news->post_by}}</span>
                            </div>
                            <div class="date-meta">
                                {{ $news->updated_at->format('d') }}<br>{{ $news->updated_at->format('M') }}

                            </div>
                        </div>
                      {!! $news->description !!}
                      
                    </div>
                     
                </div>
                 

                 

                 
            </div>
        </div>
    </div>
</div>
<!-- blog end -->

<!-- support begin -->
<div class="support support-3">
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-center">
            
            <div class="col-xl-5 col-lg-5 col-md-8 d-xl-flex d-lg-flex d-block align-items-center">
                <div class="part-text">
                    <span class="phone-number">+00 856 434 862</span>
                    <p>But I must explain to you how all this mistaken
                        denouncing praising pain was born and via us
                        passing pain was born give you.</p>
                    
                    <a href="#" class="support-button">Contact now <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="part-cta">
                    <a href="#" class="cta-button">CALL FOR ADVICE NOW</a>
                    <h2>To make requests
                        for further information,
                        contact us via our social
                        channels.</h2>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- support end -->
@endsection