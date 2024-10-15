@extends('website.layouts.app')
@section('mainwebsite')
<!-- Inne Page Banner Area Start Here -->
       <section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->blog_banner)}}">
           <div class="container">

               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumbs-area">
                           <h1>Blog</h1>
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
       <section class="section-padding-12">
           <div class="container">
               <div class="heading-layout1">
                   <h2> Our Latest Blogs</h2>
                   <p>{{$site_setting->blog_title}}</p>
               </div>
               <div class="row">
                   <div class="col-lg-8 order-lg-2">
                    @foreach ($blog_details as $blog)
                     <div class="blog-box-layout1">
                        <div class="item-img" >
                            <img src="{{asset('assets/dynamics/'.$blog->image)}}" alt="blog-thumb">
                        </div>
                        <div class="item-content">
                          <div class="item-date"><i class="fas fa-calendar-alt"></i> {{ $blog->created_at->format('d M Y ') }}</div>

                            <h2 class="item-title"><a href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}} </a></h2>
                            <p>{{ $blog->description }}</p>
                            <div class="entry-meta-2">
                                <ul>
                                    <li class="item-author">{{$blog->writer_name}}</li>
                                    <li><i class="fas fa-heart"></i><span>{{$blog->like}}</span> Likes</li>
                                    <li><i class="fas fa-comment"></i><span>{{$blog->comments}}</span> Comments</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                      
                     
                       <div class="pagination-layout1 text-center pt-5">
                           <ul>
                               <li>{!! $blog_details->appends(['sort' => 'department'])->links() !!}</li>
                               
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-4 sidebar-break-md sidebar-widget-area order-lg-1">
                     
                        <div class="widget widget-category">
                           <div class="heading-layout4">
                               <h4>Categories</h4>
                           </div>
                           <div class="category-list">
                               <ul>
                                @foreach ($servvices as $service)
                                   <li>
                                       <a href="{{route('home.services-details',$service->slug)}}"><i class="flaticon-right-arrow"></i>{{$service->title}}</a>
                                   </li>
                                   @endforeach
                                </ul>
                           </div>
                       </div>
                           <div class="widget widget-contact-form">
                                @if (session('success'))
                                   <div class="alert alert-success">{{session('success')}}</div>
                               @endif
                           <div class="heading-layout4">
                               <h4>Have you Any Question?</h4>
                              
                           </div>
                           <form class="contact-form-box" method="POST" action="{{route('home.contact-post')}}" onsubmit="return validateForm()">
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
                                        @foreach ($servvices as $service)
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
     

@endsection