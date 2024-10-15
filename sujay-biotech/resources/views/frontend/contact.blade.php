@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
    <!-- page header section start here -->
    <section class="page-header"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('{{ asset('admin/breadcrumbImage/'.$breadcrumb->image) }}')">
        <div class="page-header-area">
            <div class="container">
                <div class="page-header-content">
                    <div class="page-header-title">
                        <h2 class="text-white">Contact Us</h2>
                    </div>
                    <ul class="breadcamp">
                        <li>
                            <a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i> Home</a>
                        </li>

                        <li>
                            <a class="active">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- page header section ending here -->

    <section class="contact-us padding-tb">
        <div class="container">
            <div class="row no-gutters section-wrapper">
                <div class="col-lg-6">
                    <div class="main-addres">
                        <div class="contact-title">
                            <h4>Contact Address</h4>
                        </div>
                        <div class="contact-body">
                            <ul>
                                <li>
                                    <h6>Location :</h6>
                                    <p>{{ $sitesetting->address }}</p>
                                </li>
                                <li>
                                    <h6>Phone Number :</h6>
                                    <a href="tel:{{ $sitesetting->phone }}">{{ $sitesetting->phone }}</a>
                                </li>
                                <li>
                                    <h6>Mail Us :</h6>
                                    <a href="mailto:{{ $sitesetting->email }}">{{ $sitesetting->email }}</a>
                                </li>
                            </ul>
                        </div><!--contact-bdy-->
                    </div><!--main-address-->
                </div>
                <div class="col-lg-6">
                    <div class="contact-area">
                        <div class="contact-title">
                            <h4>Send Us a Message</h4>
                        </div>
                        <div id="respond" class="comment-respond">
                            <div class="add-comment">
                                <form action="{{ route('contact.store') }}" method="post" id="commentform" class="comment-form">
                                    @csrf
                                
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                
                                    <div class="form-group">
                                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <input name="email" type="text" value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <input name="subject" type="text" value="{{ old('subject') }}" placeholder="Subject">
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <textarea id="comment-reply" name="message" rows="3" cols="45" placeholder="Type Here Your Comment">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <button type="submit">
                                        <div class="custom-btn">
                                            <span>Submit Message</span><i class="fas fa-angle-double-right"></i>
                                        </div>
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- gmap section start here -->
    <div class="gmaps">
        <iframe
            src="{{ $sitesetting->site_location }}"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- gmap section ending here -->
@endsection
