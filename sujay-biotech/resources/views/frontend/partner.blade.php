@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')
  <!-- page header section start here -->
  <section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url('{{ asset('frontend/assets/images/breadcrumb-img.png') }}')">
    <div class="page-header-area">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-title">
                    <h2 class="text-white">Partners</h2>
                </div>
                <ul class="breadcamp">
                    <li>
                        <a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                   
                    <li>
                        <a class="active">Partners</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- page header section ending here -->

<section class="feature-section style-three padding-tb" >
    <div class="container">
        <div class="row">
            @foreach ($partners as $data )
                
            <div class="col-md-3  mb-3">
                <div class="post-thumb" data-aos="fade-left" data-aos-duration="700">
                     <img src="{{ asset('admin/partnerImage/'.$data->image) }}" alt="sponsor"> 
                    </div>
            </div><!--col-m-3-->
            @endforeach
            
        </div><!--row-->
    </div><!--container-->
</section><!--feature-section-->
@endsection