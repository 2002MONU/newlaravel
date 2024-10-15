@extends('website.layouts.app')
@section('website')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->project_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{$project->project_title}}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>{{$project->project_title}}</li>
            </ul>
        </div>
    </div>
</div>
<section class="space">
            <div class="container">
                <div class="row gy-30">
                    <div class="col-lg-12">
                        <div class="page-img"><img class="w-100" src="{{asset('assets/dynamics/'.$project->project_main_image)}}" alt="Image" /></div>
                    </div>
                   @foreach (array_slice(json_decode($project->project_small_image), 0, 2) as $image)
                    <div class="col-lg-4 col-6">
                        <div class="page-img"><img class="w-100" src="{{ asset('assets/dynamics/' . $image) }}" alt="Image" /></div>
                    </div>
                    @endforeach
                    @php
                    use Carbon\Carbon;
                   @endphp
                     <div class="col-xxl-4 col-lg-4">
                        <aside class="sidebar-area">
                            <div class="widget widget_info style2">
                                <h3 class="widget_title">Project Information</h3>
                                <ul class="service-info-list border-0 p-0 m-0">
                                    <li><strong>Project Category:</strong> {{$project->project_category}}</li>
                                    <li><strong>Clients:</strong> {{$project->clients}}</li>
                                    <li><strong>Project Date:</strong> {{$project->project_date ? Carbon::parse($project->project_date)->format('d M y') : 'N/A'}}</li>
                                    <li><strong>Avenue End Date:</strong> {{$project->avenue_end_date ? Carbon::parse($project->avenue_end_date)->format('d M y') : 'N/A'}}</li>
                                    <li><strong>Locations:</strong> {{$project->location}}</li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xxl-12">
                        <div class="page-single">
                            <div class="page-content">
                                <h2 class="h3 page-title fw-semibold">{{$project->project_title}}</h2>
                               {!! $project->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="page-single">
                            <div class="page-content"><h3 class="h4 page-title fw-semibold mb-0">Project Goal</h3></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="page-img"><img class="w-100" src="{{asset('assets/dynamics/'.$project->project_goal_image)}}" alt="Image" /></div>
                    </div>
                    <div class="col-xl-8">
                        {!! $project->project_goal_description !!}
                    </div>
                    <div class="col-xxl-12">
                        <div class="page-single mt-25">
                            <div class="page-content"><h3 class="h4 page-title fw-semibold mb-0">Project Challenge</h3></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="page-img">
                            <img class="w-100" src="{{asset('assets/dynamics/'.$project->project_challenge_image)}}" alt="Image" /></div>
                    </div>
                    <div class="col-xl-8">
                        {!! $project->project_challenge_description !!}
                    </div>
                </div>
            </div>
        </section>
@endsection