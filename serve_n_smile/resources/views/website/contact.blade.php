@extends('website.layouts.app')
@section('mainwebsite')
<section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->contact_banner)}}">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumbs-area">
                           <h1>Contact Us</h1>
                           <ul>
                               <li>
                                   <a href="{{route('home.index')}}">Home</a>
                               </li>
                               <li>Contact</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Inne Page Banner Area End Here -->
       <!-- Blog Area Start Here -->
       <section class="section-padding-12-10">
           <div class="container">
               <div class="row">
                   <div class="col-lg-8">
                       <div class="contact-box-layout1">
                           <div class="google-map-area">
                                <iframe src="{{$contact->map_link}}" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                               <div id="googleMap" class="google-map" style="width:100%; height:100px; border-radius: 4px;"></div>
                           </div>
                           <div class="contact-info">
                               <div class="media media-none-lg media-none--sm">
                                   <div class="item-icon">
                                       <i class="flaticon-call-answer"></i>
                                   </div>
                                   <div class="media-body space-md">
                                       <h4>Phone:</h4>
                                       <ul>
                                           <li>+91{{$contact->phone_no}}</li>
                                           <li>+91{{$contact->alter_phone_no}}</li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="media media-none-lg media-none--sm">
                                   <div class="item-icon">
                                       <i class="flaticon-message"></i>
                                   </div>
                                   <div class="media-body space-md">
                                       <h4>E-mail:</h4>
                                       <ul>
                                           <li>{{$contact->email}}</li>
                                           <li>{{$contact->alter_email}}</li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="media media-none-lg media-none--sm">
                                   <div class="item-icon">
                                       <i class="flaticon-maps-and-flags"></i>
                                   </div>
                                   <div class="media-body space-md">
                                       <h4>Location:</h4>
                                       <ul>
                                        <li>{!! nl2br(e($contact->location)) !!}</li>
                                     </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                       <div class="widget widget-contact-form">
                            @if (session('success'))
                                   <div class="alert alert-success">{{session('success')}}</div>
                               @endif
                           <div class="heading-layout4">
                               <h4>Have you Any Question?</h4>
                              
                           </div>
                          <form class="contact-form-box" method="POST" action="{{ route('home.contact-post') }}" onsubmit="return validateForm()">
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
       <!-- Blog Area End Here -->
       <!--Contact area end-->
<!--<script>

</script>-->
@endsection