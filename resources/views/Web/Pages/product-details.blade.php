
@extends('Web.Layouts.main')
@section('title', 'Cart')
@section('styles')

@endsection
@section('content')

@include('Web.Sections.navbar')

    <!--====== Breadcrumbs Part Start ======-->
    <section class="breadcrumbs-wrapper pt-50 pb-50 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-style breadcrumbs-style-1 d-md-flex justify-content-between align-items-center">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                            </ol>
                        </div>
                        <div class="breadcrumb-right">
                            <h5 class="heading-5 font-weight-500">Product Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Breadcrumbs Part Ends ======-->
    <!--====== Product Details Style 1 Part Start ======-->
    <section class="product-details-wrapper pt-50 pb-100">
        <div class="container">
            <div class="product-details-style-1">
                <div class="row flex-lg-row-reverse align-items-center">
                    <div class="col-lg-6">
                        <div class="product-details-image mt-50">
                            <div class="product-image">
                                <div class="product-image-active-1">
                                    @if (!empty($product->images))
                                        @php
                                            $images = json_decode($product->images, true); // Decode JSON to array
                                        @endphp

                                        @foreach ($images as $image)
                                            <div class="single-image">
                                                <img src="{{ asset($image) }}" alt="Product Image">
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No images available.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="product-details-image mt-50">

                                    <div class="product-thumb-image">
                                        <div class="product-thumb-image-active-1">
                                            @if (!empty($product->images))
                                                @foreach ($images as $image)
                                                    <div class="single-thumb">
                                                        <img src="{{ asset($image) }}" alt="Product Thumbnail">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No thumbnails available.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="product-details-content mt-45">

                            <p class="sub-title">{{ $product->category->name }}</p>
                            <h2 class="title">{{ $product->name }}</h2>

                            <div class="product-items flex-wrap">



                                <h6 class="item-title">Select Your {{ $product->name }}: </h6>


                                <div class="product-select-wrapper flex-wrap">
                                    <!-- Color Selection -->
                                    <div class="select-item">
                                        <h6 class="select-title">Select Color: <span id="selected-color"></span></h6>
                                        <ul class="color-select">
                                            @if($product->optionValues->isNotEmpty())
                                                @foreach($product->optionValues as $optionValue)
                                                    @if($optionValue->option->name === 'Color') <!-- Filter color options -->
                                                        <li
                                                            class="color-option {{ $loop->first ? 'active' : '' }}"
                                                            data-color="{{ $optionValue->value }}"
                                                            title=" {{ $optionValue->value }}"
                                                            style="background-color: {{ $optionValue->value }};">
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>No colors available for this product.</p>
                                            @endif
                                        </ul>
                                    </div>

                                    <!-- Size Selection -->
                                    <div class="select-item">
                                        <h6 class="select-title">Select Size: <span id="selected-size"></span></h6>
                                        <ul class="size-select">
                                            @if($product->optionValues->isNotEmpty())
                                                @foreach($product->optionValues as $optionValue)
                                                    @if($optionValue->option->name === 'Size') <!-- Filter size options -->
                                                        <li
                                                            class="size-option {{ $loop->first ? 'active' : '' }}"
                                                            data-size="{{ $optionValue->value }}"
                                                            title=" {{ $optionValue->value }}">
                                                            {{ $optionValue->value }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>No sizes available for this product.</p>
                                            @endif
                                        </ul>
                                    </div>
                                </div>


                            </div>






                            <div class="product-select-wrapper flex-wrap">


                                <div class="select-item">
                                    <h6 class="select-title">Select Quantity: </h6>

                                    <div class="select-quantity">
                                        <button type="button" id="sub" class="sub"><i class="mdi mdi-minus"></i></button>
                                        <input type="text" id="quantity-input" value="1" readonly />
                                        <button type="button" id="add" class="add"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <h6 class="select-title">Select Shipping Country: </h6>
                                    <div class="country-select">
                                        <select>
                                            <option value="0">-- Select Country --</option>
                                            @foreach (App\Models\Admin\Location::get() as $location)
                                            <option value="">{{ $location->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="product-price">
                                <h6 class="price-title">Price: </h6>
                                <p class="sale-price">$ {{ $product->price }} USD</p>

                            </div>

                            <div class="product-btn">
                                <a href="{{ route('add_to_cart', $product->id) }}" class="main-btn primary-btn">
                                    <img src="{{asset('assets/images/icon-svg/cart-4.svg') }}" alt="">
                                    Add to cart
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Product Details Style 1 Part Ends ======-->

    <!--====== Reviews Part Start ======-->
    <section class="reviews-wrapper pt-100 pb-100 ">
        <div class="container">
            <div class="reviews-style">
                <div class="reviews-menu">

                    <ul class="breadcrumb-list-grid nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                Details
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications"
                                aria-selected="false">
                                specifications
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="details-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">{{ $product->name }}</h4>
                                    </div>
                                    <p class="mb-15 pt-30">{{ $product->desc }}.</p>
                                    <p class="mb-30">{{ $product->desc }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="review-wrapper">
                            <div class="reviews-title">
                                <h4 class="title">Customer Reviews (38)</h4>
                            </div>

                            <div class="reviews-rating-wrapper flex-wrap">
                                <div class="reviews-rating-star">
                                    <p class="rating-review"><i class="mdi mdi-star"></i> <span>4.5</span> of 5</p>

                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">5 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 60%;"></div>
                                            </div>
                                            <p class="percent">60%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">4 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 20%;"></div>
                                            </div>
                                            <p class="percent">20%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">3 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 10%;"></div>
                                            </div>
                                            <p class="percent">10%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">2 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 5%;"></div>
                                            </div>
                                            <p class="percent">05%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">1 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 0;"></div>
                                            </div>
                                            <p class="percent">0%</p>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('product.review', $product) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Rating:</label>
                                        <select name="rating" id="rating">
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="5">5 Stars</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="review_text">Review:</label>
                                        <textarea name="review_text" id="review_text" rows="4"></textarea>
                                    </div>
                                    <button type="submit">Submit Review</button>
                                </form>

                            </div>

                            <div class="reviews-btn flex-wrap">
                                <div class="reviews-btn-left">
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button class="main-btn primary-btn" type="button" id="dropdownMenu-1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> All Stars (213) <i
                                                    class="mdi mdi-chevron-down"></i></button>

                                            <ul class="dropdown-menu sub-menu-bar" aria-labelledby="dropdownMenu-1">
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button class="main-btn primary-btn-border" type="button" id="dropdownMenu-1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> Sort by Latest <i
                                                    class="mdi mdi-chevron-down"></i></button>

                                            <ul class="dropdown-menu sub-menu-bar" aria-labelledby="dropdownMenu-1">
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-btn-right">
                                    <a href="#" class="main-btn">with photo (18)</a>
                                    <a href="#" class="main-btn">additional feedback (23)</a>
                                </div>
                            </div>

                            <div class="reviews-comment">
                                <ul class="comment-items">
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img src="assets/images/review/author-1.jpg" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>

                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"><strong>4</strong> of 5</span>
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring. Currently
                                                    are really not taken. For me quiet. With my Beats of course can not be compared. But
                                                    for the money and definitely recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is not the best but because of
                                                    cost-benefit ratio it seems very good to me, recommended the seller .</p>
                                                <ul class="comment-meta">
                                                    <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <ul class="comment-replay">
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img src="assets/images/review/author-2.jpg" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>

                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"><strong>4</strong> of 5</span>
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring.
                                                            Currently are really not taken.</p>
                                                        <div class="comment-image flex-wrap">
                                                            <div class="image">
                                                                <img src="assets/images/review/attachment-1.jpg" alt="">
                                                            </div>
                                                            <div class="image">
                                                                <img src="assets/images/review/attachment-2.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <ul class="comment-meta">
                                                            <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img src="assets/images/review/author-3.jpg" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>

                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"><strong>4</strong> of 5</span>
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring.
                                                            Currently are really not taken.</p>
                                                        <ul class="comment-meta">
                                                            <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img src="assets/images/review/author-4.jpg" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>

                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"><strong>4</strong> of 5</span>
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring. Currently
                                                    are really not taken. For me quiet. With my Beats of course can not be compared. But
                                                    for the money and definitely recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is not the best but because of
                                                    cost-benefit ratio it seems very good to me, recommended the seller .</p>
                                                <ul class="comment-meta">
                                                    <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                        <div class="specifications-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">{{ $product->name }}</h4>
                                    </div>
                                    <p class="mb-15 pt-30">{{ $product->desc }}.</p>
                                    <p class="mb-30">{{ $product->desc }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--====== Reviews Part Ends ======-->
    @include('Web.Sections.feature')
    @include('Web.Sections.client-logo')
      <!--====== Subscribe Part Start ======-->
      <section class="subscribe-section pt-70 pb-70 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="heading text-center">
                        <h1 class="heading-1 font-weight-700 text-white mb-10">Subscribe Newsletter</h1>
                        <p class="gray-3">Be the first to know when new products drop and get behind-the-scenes content
                            straight.</p>
                    </div>
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="single-form form-default">
                                <label class="text-white-50">Enter your email address</label>
                                <div class="form-input">
                                    <input type="text" placeholder="user@email.com">
                                    <i class="mdi mdi-account"></i>
                                    <button class="main-btn primary-btn"><span class="mdi mdi-send"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Subscribe Part Ends ======-->
    @include('Web.Sections.footer')

    @endsection
    <title>My App</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle Color Selection
            const colorOptions = document.querySelectorAll('.color-option');
            const selectedColorSpan = document.getElementById('selected-color');

            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove active class from all options
                    colorOptions.forEach(opt => opt.classList.remove('active'));

                    // Add active class to the clicked option
                    this.classList.add('active');

                    // Update selected color display
                    selectedColorSpan.textContent = this.title;
                    selectedColorSpan.style.color = this.getAttribute('data-color');
                });
            });

            // Handle Size Selection
            const sizeOptions = document.querySelectorAll('.size-option');
            const selectedSizeSpan = document.getElementById('selected-size');

            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove active class from all options
                    sizeOptions.forEach(opt => opt.classList.remove('active'));

                    // Add active class to the clicked option
                    this.classList.add('active');

                    // Update selected size display
                    selectedSizeSpan.textContent = this.title;
                });
            });
        });

//         <script>
// document.addEventListener('DOMContentLoaded', function() {
//     const quantityInput = document.getElementById('quantity-input');
//     const addButton = document.getElementById('add');
//     const subButton = document.getElementById('sub');
//     const minQuantity = 1; // Minimum quantity allowed
//     const maxQuantity = 100; // Maximum quantity, adjust as needed

//     // Default quantity value
//     let quantity = parseInt(quantityInput.value, 10);

//     // Function to update the quantity
//     function updateQuantity(newQuantity) {
//         // Ensure quantity is within bounds
//         if (newQuantity >= minQuantity && newQuantity <= maxQuantity) {
//             quantity = newQuantity;
//             quantityInput.value = quantity;

//             // Example: Update total price (assuming price per item is $10)
//             // Update this based on your pricing logic
//             const pricePerItem = 10;
//             const totalPrice = quantity * pricePerItem;
//             document.getElementById('total-price').textContent = `$${totalPrice.toFixed(2)}`;

//             // You can also make an AJAX request to update the quantity on the server
//             // Example: sendQuantityToServer(quantity);
//         }
//     }

//     addButton.addEventListener('click', function() {
//         updateQuantity(quantity + 1);
//     });

//     subButton.addEventListener('click', function() {
//         updateQuantity(quantity - 1);
//     });

//     // Example function to send quantity to the server
//     function sendQuantityToServer(quantity) {
//         fetch('/update-quantity', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ quantity: quantity })
//         })
//         .then(response => response.json())
//         .then(data => {
//             console.log('Quantity updated successfully:', data);
//         })
//         .catch(error => {
//             console.error('Error updating quantity:', error);
//         });
//     }
// });
{{-- </script> --}}

        </script>




