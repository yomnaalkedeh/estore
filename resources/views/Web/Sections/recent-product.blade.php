    <!--====== Product Style 7 Part Start ======-->
    <section class="product-wrapper pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-50">
                        <h1 class="heading-1 font-weight-700">{{ __("profile.Recent Items") }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach (App\Models\Admin\Product::orderByDesc('id')->paginate(4) as $product)
                <x-recent-product :product="$product" />
            @endforeach

            </div>
        </div>
    </section>
    <!--====== Product Style 7 Part Ends ======-->

