@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb begin -->
<div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->download_banner)}})">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-6 col-lg-6">
               <div class="breadcrumb-content text-center">
                   <h2>Download</h2>
                   <ul>
                       <li><a href="{{route('home.index')}}">Home</a></li>
                       <li>Download</li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>
<!-- breadcrumb end -->


<section class="download-section">
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <ul>
                @foreach ($downloads as $download)
                <li>
                       <div class="downlaod-pdf">
                           <a target="_blank" href="{{asset('assets/dynamics/'.$download->pdf)}}"> 
                       <div>
                       <p>{{$download->title}}</p>
                   </div>
                   </a>
                   <div>
                       <a target="_blank" href="{{asset('assets/dynamics/'.$download->pdf)}}">
                       </a><a target="_blank" href="{{asset('assets/dynamics/'.$download->pdf)}}">Download</a>
                   </div>
                   </div>
                </li>
                @endforeach
             </ul>
           </div><!--col-md-10-->
       </div><!--row-->
   </div><!--container-->
</section><!--download-section-->

@endsection