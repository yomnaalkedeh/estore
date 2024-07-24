<section class="product-wrapper pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-50">
                    <h1 class="heading-1 font-weight-700">{{ __("profile.Featured Items") }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (App\Models\Admin\Product::paginate(5) as $product)
                <x-product-card :product="$product" />
            @endforeach

        </div>
    </div>
</section>
<!--====== Product Style 1 Part Ends ======-->

