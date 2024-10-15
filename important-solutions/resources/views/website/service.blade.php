@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" style="background : url({{asset('assets/dynamics/setting/'.$site_setting->service_banner)}})">
  <div class="container">
     <div class="breadcumb-content">
        <h1 class="breadcumb-title">Services</h1>
        <ul class="breadcumb-menu">
           <li><a href="{{route('home.index')}}">Home</a></li>
           <li>Services</li>
        </ul>
     </div>
  </div>
</div>


<section class="space">
<div class="container">
<div class="row justify-content-center">
  @foreach ($services as $service)
  <div class="col-xl-4 col-md-6">
    <div class="service-card3">
      <div class="box-content">
        <div class="service-card-icon"><img src="{{asset('assets/dynamics/service/'.$service->service_icon)}}" alt="Icon"></div>
        <h3 class="box-title"> {{$service->service_name}} </h3>
      </div>
    
    </div>
  </div>
  @endforeach
  

 </div>
 </div>
</div>
</section>

@endsection
