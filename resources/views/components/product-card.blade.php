

<div class="col-lg-4 col-sm-6">
    <div class="product-style-1 mt-30" >
        <div class="product-image" style="height: 63%">
            <span class="icon-text text-style-1">20% off</span>
            <div class="product-active">
                <div class="product-item active">
                    <img src="{{ asset('assets/images/product-1'.$product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-item">
                    <img src="{{ asset('assets/images/product-1'.$product->image) }}" alt="{{ $product->name }}">
                </div>
            </div>

            <li>
                <a class="add-wishlist" href="{{ route('add-to-favorites', $product->id) }}" role="button">
                    <i class="mdi mdi-heart-outline"></i>
                </a>
            </li>
        </div>
        <div class="product-content text-center">
            <h4 class="title"><a href="{{ route('productDetail',$product->id) }}">{{ $product->name }}</a></h4>
            <p>{{ $product->category->name }}</p>
            <p class="btn-holder"></p>
            <a href="{{ route('add_to_cart', $product->id) }}"  class="main-btn secondary-1-btn" role="button">
                <img src="{{ asset('assets/images/icon-svg/cart-4.svg')}}" alt="">
                {{ __("profile.Add to Cart") }}
            </a>
        </div>
    </div>
</div>




