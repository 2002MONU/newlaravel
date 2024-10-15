@extends('frontend.layout.app')

@section('content')

<!-- page header section start here -->
<section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('admin/researchtypeImage/'.$researchtype->image) }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="page-header-area">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-title">
                    <h2 class="text-white">{{ $researchtype->title }}</h2>
                </div>
                <ul class="breadcamp">
                    <li>
                        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a class="active">{{ $researchtype->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- page header section ending here -->

<section class="campaign-section style-two style-three style-four padding-tb">
    <div class="container">
        <div class="section-wrapper">
            @foreach ($research as $researchItem)
            
                <div class="post-item" data-aos="fade-{{ $loop->iteration % 2 == 0 ? 'up' : ($loop->iteration % 3 == 0 ? 'right' : 'left') }}" data-aos-duration="700">
                    <div class="post-inner">
                        <div class="post">
                            <img style="width :100%; height: 350px; object-fit: cover"  src="{{ asset('admin/ResearchDevelopmentImage/' . $researchItem->image) }}" alt="{{ $researchItem->title }}"> 
                        </div>
                        <div class="post-content">
                            <h5>{{ $researchItem->title }}</h5>
                            <p class="mb-0">{!! $researchItem->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <ul class="pagination" data-aos="fade-up" data-aos-duration="700">
            <!-- Pagination logic -->
        </ul>
    </div>
</section>

@endsection
