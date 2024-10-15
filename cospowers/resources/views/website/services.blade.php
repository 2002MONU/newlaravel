@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->service_banner)}})">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-6 col-lg-6">
               <div class="breadcrumb-content text-center">
                   <h2>{{$service->title}}</h2>
                   <ul>
                       <li><a href="{{route('home.index')}}">Home</a></li>
                       <li>{{$service->title}}</li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- breadcrumb end -->
<!-- service begin -->
<div class="service-service-page service-details">
   <div class="container">
       <div class="row justify-content-xl-between justify-content-lg-between justify-content-center">
           <div class="col-xl-4 col-lg-4 col-md-10">
               <div class="sidebar">
                   <div class="sidebar-widget">
                       <div class="all-solutions">
                           <h4>All Services</h4>
                           <ul>
                            @foreach ($services as $service)
                            <li>
                                <a class="active" href="{{route('home.services-details',$service->slug)}}">{{$service->title}}<span class="icon"><i class="fas fa-plus"></i></span></a>
                            </li>
                            @endforeach 

                           </ul>
                       </div>
                   </div>
                   <div class="sidebar-widget">
                    <div class="appointment-form">
                        <h4>Enquiry Now</h4>
                        @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                       @endif  
                        <form action="{{route('home.enquiryForm')}}" method="POST">
                         @csrf
                            <div class="mb-3">
                                <input type="text" name="full_name" placeholder="Name here">
                                @error('full_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                             <div class="mb-3">
                                <input type="number" name="mobile_no" placeholder="Phone here">
                                @error('mobile_no')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                             <div class="mb-3">
                                <input type="email" name="email" placeholder="Email here">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-3">
                                 <input type="text" name="subject" placeholder="Subject">
                                 @error('subject')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <button type="submit">Submit now</button>
                        </form>
                    </div>
                </div>
               </div>
           </div>
           <div class="col-xl-8 col-lg-8 col-md-10">
               <div class="service-details-area">
                   <div class="part-img">
                       <img src="{{asset('assets/dynamics/'.$service->image)}}" alt="service">
                   </div>
                   <div class="service-details-body">
                       <div class="part-text">
                           <h2>{{$service->title}}</h2>
                           {!! $service->description !!}
                       </div>
            
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- service end -->

@endsection