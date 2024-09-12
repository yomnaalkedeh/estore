<div class="col-lg-6">
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


                <li>
                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
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




