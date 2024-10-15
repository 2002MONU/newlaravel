@extends('Frontend.layouts.app')
@section('content')
<div class="breadcumb-wrapper background-image" style="background-image: url('{{ asset('frontend/assets/images/breadcumb-bg.jpg') }}');">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Our services</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                <li>Our services</li>
            </ul>
        </div>
    </div>
</div>
<section class="bg-top-center overflow-hidden space">
            <div class="container">
                <div class="row gy-4">
                      @if($service->isNotEmpty())
                    @foreach ($service as $data )
                    <div class="col-md-6 col-xl-4">
                        <div class="service-item">
                            <div class="service-item_wrapper">
                                <div class="service-item_img">
                                    <img src="{{ asset('admin/serviceImage/'.$data->image) }}" alt="img">
                                </div>
                            </div>
                            <div class="service-item_content">
                                <h3 class="box-title">{{ $data->name }}</h3>
                                <p class="service-item_text">{!! $data->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h4>No Records Found</h4>
                    @endif
                </div>
            </div>
        </section>
@endsection