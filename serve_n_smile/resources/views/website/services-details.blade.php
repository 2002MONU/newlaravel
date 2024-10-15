@extends('website.layouts.app')
@section('mainwebsite')
 <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->service_banner)}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Services</h1>
                            <ul>
                                <li>
                                    <a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('home.services')}}">Services</a>
                                </li>
                                 <li>
                                  {{$service->title }}
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
         <!-- Single Service Area Start Here -->
        <section class="section-padding-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-service-box-layout1">
                            <div class="main-img">
                                <img src="{{asset('assets/dynamics/'.$service->service_image_big)}}" alt="Kitchen Cleaning">
                            </div>
                            <div class="service-content">
                                <h2 class="item-title"> {{$service->title }} </h2>
                                {!! $service->description !!}
                              
                                <div class="service-faq">
                                    <h3 class="item-title">Frequently Ask Questions</h3>
                                    <p>{{$site_setting->faq_title}}</p>
                                    <div class="faq-box">
                                        <div id="accordion" class="accordion">
                                            <div id="accordion">
                                                @foreach ($faqs as $faq)
                                                 <div class="card">
                                                        <div class="card-header" id="heading{{$faq->id}}">
                                                            <h5 class="heading-title" data-toggle="collapse" data-target="#collapse{{$faq->id}}" 
                                                                aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                                                {{$faq->question}}
                                                            </h5>
                                                        </div>
                                                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
                                                            <div class="card-body">
                                                                {{$faq->answer}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                @endforeach
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                                     <div class="widget widget-service-info">
                            <div class="heading-layout4">
                                <h4>Service Information</h4>
                            </div>
                            <div class="service-info">
                                <ul>
                                    <li class="active">
                                        <div class="service-price">RS. {{$service->price}} </div>
                                    </li>
                                    <li>
                                        <div class="item-title">Cleaning Hours</div>
                                        <div class="item-subtitle">{{$service->cleaning_hour}}</div>
                                    </li>
                                    <li>
                                        <div class="item-title">Number of Cleaners</div>
                                        <div class="item-subtitle">{{$service->no_of_cleaner}} Cleaner</div>
                                    </li>
                                    <li>
                                        <div class="item-title">Visiting Hours</div>
                                        <div class="item-subtitle">{{$service->visiting_hours}}</div>
                                    </li>
                                    <li>
                                        <div class="item-title">Contact</div>
                                        <div class="item-subtitle">+91 {{$service->contact}}</div>
                                    </li>
                                    <li>
                                        <div class="item-title">E-mail</div>
                                        <div class="item-subtitle">{{$service->email}}</div>
                                    </li>
                                </ul>
                                <a href="{{route('home.contact')}}" class="fw-btn-fill bg-accent text-primarytext mt-1">Get In Touch</a>
                            </div>
                        </div>
                      
                        <div class="widget widget-contact-form">
                             @if (session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <div class="heading-layout4">
                                <h4>Have you Any Question?</h4>
                               
                            </div>
                            <form class="contact-form-box" method="POST" action="{{route('home.contact-post')}}">
                                @csrf
                                <div class="row">
                                <div class="col-12 form-group">
                                    <div class="form-icon"><i class="fas fa-user"></i></div>
                                    <input type="text" placeholder="Name" class="form-control" name="full_name" id="full_name" data-error="Name field is required" required>
                                    <div class="text-danger" id="nameError"></div>
                                    @error('full_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-icon"><i class="far fa-envelope"></i></div>
                                    <input type="email" placeholder="E-mail Address" class="form-control" name="email" id="email" data-error="Email field is required" required>
                                    <div class="text-danger" id="emailError"></div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-icon"><i class="fas fa-phone-volume"></i></div>
                                    <input type="text" placeholder="Phone" class="form-control" name="phone_no" id="phone_no" data-error="Phone field is required" required>
                                    <div class="text-danger" id="phoneError"></div>
                                    @error('phone_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-icon"><i class="fas fa-question"></i></div>
                                    <select name="service" class="form-control new-service" id="service" required>
                                        <option selected disabled class="main-select">Services</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->title }}" class="first-select">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="serviceError"></div>
                                    @error('service')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-icon"><i class="far fa-comments"></i></div>
                                    <textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="4" cols="20" required data-error="Message field is required"></textarea>
                                    <div class="text-danger" id="messageError"></div>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <button type="submit" class="fw-btn-fill bg-accent text-primarytext">Send Message</button>
                                </div>
                            </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Service Area End Here -->
      
@endsection