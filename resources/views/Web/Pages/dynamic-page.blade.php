@extends('Web.Layouts.main')
@section('styles')

@endsection
@section('content')
@include('Web.Sections.navbar')



   <!--====== Breadcrumbs Part Start ======-->
   <section class="breadcrumbs-wrapper pt-50 pb-50 bg-primary-4">
    <div class="container">
        <div class="row">
            @foreach ($pages as $page)
            <div class="col-lg-12">
                <div class="breadcrumbs-style breadcrumbs-style-1 d-md-flex justify-content-between align-items-center">
                    <div class="breadcrumb-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{  $page->type->name  }}</li>
                        </ol>
                    </div>
                    <div class="breadcrumb-right">
                        <h5 class="heading-5 font-weight-500">{{  $page->type->name  }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Breadcrumbs Part Ends ======-->


<section class="content-card-wrapper">
    <div class="content-card-style-1">
        <div class="container">

            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="content-card-content">

                        <h6 class="sub-title">{{  $page->type->name  }} eStore</h6>
                        <h2 class="main-title">{!!  $page->title  !!}</h2>
                    </div>
                    <div class="content-para pt-20">
                        <p class="mb-15">{!! $page->body !!}
                           </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="content-card-image-2 bg_cover" style="background-image: url({{asset('assets/images/content-card-1/content-2.jpg') }});"></div>
    </div>
</section>
@include('Web.Sections.feature')

    <!--====== Subscribe Part Start ======-->
    <section class="subscribe-section pt-70 pb-70 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="heading text-center">
                        <h1 class="heading-1 font-weight-700 text-white mb-10">You are using free lite version</h1>
                        <p class="gray-3">Please, purchase full version of the template to get all pages, sections, features and permission to remove footer credits.</p>
                        </br>
                        <a href="https://rebrand.ly/estore-gg" rel="nofollow" target="_blank" class="main-btn secondary-1-btn">
                                <img src="{{asset('assets/images/icon-svg/cart-7.svg')}}" alt="">
                                PURCHASE NOW
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Subscribe Part Ends ======-->
@include('Web.Sections.client-logo')
@include('Web.Sections.subscribe')
@include('Web.Sections.footer')
@endsection
