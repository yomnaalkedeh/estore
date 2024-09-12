

<div class="col-lg-4 col-sm-6">
    <div class="product-style-1 mt-30" >
        <div class="product-image" style="height: 63%">
            <span class="icon-text text-style-1">20% off</span>
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

                <a class="add-wishlist" href="javascript:void(0);"
                   onclick="event.preventDefault(); document.getElementById('favorite-form-{{ $product->id }}').submit();"
                   role="button">
                    <i class="mdi {{ auth()->check() && auth()->user()->favorites->contains('favoritable_id', $product->id) ? 'mdi-heart text-red-500' : 'mdi-heart-outline' }}"></i>
                </a>

                <form id="favorite-form-{{ $product->id }}" action="{{ route('add-to-favorites', $product->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>



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




