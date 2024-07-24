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
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px; padding:15px ;">
            <div class="img_thumbnail productlist">


                <img src="{{ asset('assets/images/product-1'.$product->image) }}" alt="{{ $product->name }}">

                <div class="caption">
                    <h4><a href="{{ route('productDetail',$product->id) }}">{{ $product->name }}</a></h4>
                    <p>{{ $product->desc }}</p>
                    <p><strong>Price: </strong> ${{ $product->price }}</p>

                        @if(auth()->check() && auth()->user()->favorites->contains('favoritable_id', $product->id))
                        <p>This product is in your favorites.</p>
                    @else
                        <form action="{{ route('add-to-favorites', $product->id) }}" method="post">
                            @csrf
                            <button type="submit">Add to Favorites</button>
                        </form>
                    @endif

                    <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
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

