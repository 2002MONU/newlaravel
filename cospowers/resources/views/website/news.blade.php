 
@extends('website.layouts.app')
@section('mainwebsite')
 <!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->news_banner)}})">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="breadcrumb-content text-center">
                    <h2>News</h2>
                    <ul>
                        <li><a href="{{route('home.index')}}">Home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- blog begin -->
<div class="blog blog-page">
    <div class="container">
        <div class="row">
            @foreach ($news_details as $news)
                
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="part-text">
                         <h3>
                            <a href="{{route('home.news-details',$news->slug)}}">{{$news->title}}</a>
                         </h3>
                         {!! \Illuminate\Support\Str::words($news->description, 35, '...') !!}
                    </div>
                    <div class="part-img">
                       <a href="{{route('home.news-details',$news->slug)}}">
                            <img src="{{asset('assets/dynamics/'.$news->image)}}" alt="news-image">
                       </a>
                    </div>
                    <div class="part-meta">
                        <ul>
                            <li>
                                <i class="fas fa-user"></i> {{$news->post_by}}
                            </li>
                            <li>
                                <i class="far fa-calendar-alt"></i>  {{$news->updated_at->format('d.m.Y')}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
           <div class="col-xl-12 col-lg-12">
                <div class="justify-content-center">
                    {!! $news_details->appends(['sort' => 'department'])->links() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- blog end -->

@endsection