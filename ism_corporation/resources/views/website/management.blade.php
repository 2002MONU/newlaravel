@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->company_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Management</h2>
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
    <div class="section">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="title">Our <span>Team</span></h2>
            </div>
            @foreach ($managements as $manage)
                @if($loop->iteration % 2 == 1)
                    <!-- Layout for odd iterations -->
                    <div class="row align-items-start director">
                        <div class="mb-6 col-lg-4 col-sm-12 order-lg-0">
                            <div class="team-wrap">
                                <div class="team-top ism-tea">
                                    <img src="{{ asset('assets/dynamics/ourcompany/'.$manage->image) }}" alt="team">
                                    <div class="team-top-content">
                                        <h4 class="name">{{ $manage->name }}</h4>
                                        <span class="profession">{{ $manage->post }}</span>
                                    </div>
                                </div>
                                <div class="team-bottom">
                                    <div class="team-bottom-content">
                                        <h4 class="name">{{ $manage->name }}</h4>
                                        <span class="profession">{{ $manage->post }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 order-lg-1">
                            <div>
                                <div class="team-bottom-content">
                                    <h4 class="name">{{ $manage->name }}</h4>
                                </div>
                                {!! $manage->description !!}
                            </div>
                        </div>
                    </div>
                @else
        <!-- Layout for even iterations -->
        <div class="row align-items-start director">
            <div class="mb-6 col-lg-4 col-sm-12 order-lg-1">
                <div class="team-wrap">
                    <div class="team-top ">
                        <img src="{{ asset('assets/dynamics/ourcompany/'.$manage->image) }}" alt="team">
                        <div class="team-top-content">
                            <h4 class="name">{{ $manage->name }}</h4>
                            <span class="profession">{{ $manage->post }}</span>
                        </div>
                    </div>
                    <div class="team-bottom">
                        <div class="team-bottom-content">
                            <h4 class="name">{{ $manage->name }}</h4>
                            <span class="profession">{{ $manage->post }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-lg-0">
                <div>
                    <div class="team-bottom-content">
                        <h4 class="name">{{ $manage->name }}</h4>
                    </div>
                    {!! $manage->description !!}
                </div>
            </div>
        </div>
    @endif
   @endforeach
     </div>
    </div>
 </section>
@endsection