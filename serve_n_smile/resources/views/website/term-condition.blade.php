@extends('website.layouts.app')
@section('mainwebsite')
<!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/img/blue-bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Terms and Conditions</h1>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="terms ">
                  {!! $term->description !!}
       
           </div>
            </div>
        </div>
    </div>
@endsection