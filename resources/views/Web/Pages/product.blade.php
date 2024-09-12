@extends('Web.Layouts.main')
@section('title', 'Product')
@section('styles')

@endsection
@section('content')

@include('Web.Sections.navbar')

    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('profile') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Product</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="row" id="productList">
        @foreach($products as $product)
        <div class="col-lg-4" style="margin-left: 20px">
            <div class="product-style-7 mt-30">
                <div class="product-image">
                    <div class="product-active">
                        @if (!empty($product->images))
                        @php
                            $images = json_decode($product->images, true); // Decode JSON to array
                        @endphp

                        @foreach ($images as $image)
                            <img src="{{ asset($image) }}" alt="Product Image" width="100">
                        @endforeach

                    @else
                        <p>No images available.</p>
                    @endif


                    </div>
                </div>
                <div class="product-content">
                    <ul class="product-meta">
                        <li>
                            @if(auth()->check() && auth()->user()->favorites->contains('favoritable_id', $product->id))
                                <p>This product is in your favorites.</p>
                            @else
                                <form action="{{ route('add-to-favorites', $product->id) }}" method="post" id="favorite-form-{{ $product->id }}" style="display: none;">
                                    @csrf
                                </form>

                                <a class="add-wishlist" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('favorite-form-{{ $product->id }}').submit();">
                                    <i class="mdi mdi-heart-outline"></i>
                                    {{ __("Add to Favorite") }}
                                </a>
                            @endif
                        </li>

                    </ul>
                    <h4 class="title"><a href="{{ route('productDetail',$product->id) }}">{{ $product->name }}</a></h4>
                    <p>{{ $product->category->name }}</p>
                    <span class="price">$ {{ $product->price }}</span>
                    <a href="{{ route('add_to_cart', $product->id) }}" class="main-btn primary-btn" role="button">
                        <img src="{{asset('assets/images/icon-svg/cart-4.svg ')}}" alt="">
                        {{ __("profile.Add to Cart") }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

<div class="card-footer clearfix" id="paginationLinks">
    {!! $products->links() !!}

</div>

@include('Web.Sections.footer')


@endsection

