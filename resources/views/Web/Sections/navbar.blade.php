    <!--====== Navbar Style 7 Part Start ======-->
    <div class="navigation">
        <header class="navbar-style-7 position-relative">
            <div class="container">
                <!-- navbar mobile Start -->
                <div class="navbar-mobile d-lg-none">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <!-- navbar cart start -->
                            <div class="navbar-toggle icon-text-btn">
                                <a class="icon-btn primary-icon-text mobile-menu-open-7" href="javascript:void(0)">
                                    <i class="mdi mdi-menu"></i>
                                </a>
                            </div>
                            <!-- navbar cart Ends -->
                        </div>
                        <div class="col-6">
                            <!-- desktop logo Start -->
                            <div class="mobile-logo text-center">
                                <a href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="Logo"></a>
                            </div>
                            <!-- desktop logo Ends -->
                        </div>
                        <div class="col-3">
                            <!-- navbar cart start -->
                            <div class="navbar-cart">
                                <a class="icon-btn primary-icon-text icon-text-btn" href="javascript:void(0)">
                                    <img src="{{asset('assets/images/icon-svg/cart-1.svg') }}" alt="Icon">
                                    <span class="icon-text text-style-1">{{ count((array) session('cart')) }}</span>
                                </a>

                                <div class="navbar-cart-dropdown">
                                    <div class="checkout-style-2">
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                        <div class="checkout-header d-flex justify-content-between">
                                            <h6 class="title"> {{ __("profile.shopping cart") }}</h6>
                                        </div>

                                        <div class="checkout-table table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                    <tr>
                                                        <td class="checkout-product">
                                                            <div class="product-cart d-flex">
                                                                <div class="product-thumb">
                                                                    <img src="{{asset('assets/images/product-cart/product-1.png')}}"
                                                                        alt="Product">
                                                                </div>

                                                                <div class="product-content media-body">
                                                                    <h5 class="title">
                                                                        <a href="product-details-page.html">{{ isset($details['name'])? $details['name'] : '' }}</a>
                                                                    </h5>
                                                                    <ul>
                                                                        <li><span>Brown</span></li>
                                                                        <li><span>XL</span></li>
                                                                        <li>
                                                                            <a class="delete" href="javascript:void(0)">
                                                                                <i class="mdi mdi-delete"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="checkout-quantity">
                                                            <div class="product-quantity d-inline-flex">
                                                                <button type="button" id="sub" class="sub">
                                                                    <i class="mdi mdi-minus"></i>
                                                                </button>
                                                                <input type="text" value="1">
                                                                <button type="button" id="add" class="add">
                                                                    <i class="mdi mdi-plus"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td class="checkout-price">
                                                            <p class="price">${{ $details['price'] }}</p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="checkout-footer">
                                            <div class="checkout-sub-total d-flex justify-content-between">
                                                <p class="value">${{ $total }}</p>
                                                <p class="price">${{ $total }}</p>
                                            </div>
                                            <div class="checkout-btn">
                                                <a href="{{ route('cart') }}" class="main-btn primary-btn-border">View Cart</a>
                                                <a href="{{ route('checkout') }}" class="main-btn primary-btn">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- navbar cart Ends -->
                        </div>
                    </div>
                    <!-- navbar search start -->
                    <div class="navbar-search mt-15 search-style-5">
                        <div class="search-select">
                            <select name="category" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach (App\Models\Admin\Category::get() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search-input">
                            <input type="text" name="search" placeholder="Search" value="">
                        </div>
                        <div class="search-btn">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                    <!-- navbar search Ends -->
                </div>
                <!-- navbar mobile Start -->
            </div>

            <div class="navbar-container navbar-sidebar-7">
                <!-- navbar close  Ends -->
                <div class="navbar-close d-lg-none">
                    <a class="close-mobile-menu-7" href="javascript:void(0)"><i class="mdi mdi-close"></i></a>
                </div>
                <!-- navbar close  Ends -->

                <!-- navbar top Start -->
                <div class="navbar-top-wrapper">
                    <div class="container-lg">
                        <div class="navbar-top d-lg-flex justify-content-between">
                            <!-- navbar top left Start -->
                            <div class="navbar-top-left">
                                <ul class="navbar-top-link">

                                    @php
                                    use App\Enums\PagesEnum;
                                    @endphp
                                    <li><a href="{{ route('pages', ['type' => PagesEnum::ABOUT]) }}" target="_blank">{{ __("profile.about") }}</a></li>
                                    <li><a href="{{ route('pages', ['type' => PagesEnum::CONTACT]) }}" target="_blank">{{ __("profile.contact") }}</a></li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="mdi mdi-phone-in-talk"></i>
                                            +8801234567890
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar top left Ends -->
                            <!-- navbar top right Start -->
                            <div class="navbar-top-right">
                                <ul class="navbar-top-link">
                                    <li>
                                        <select>
                                            <option value="0">$ USD</option>
                                            <option value="1">€ EURO</option>
                                            <option value="2">$ CAD</option>
                                            <option value="3">₹ INR</option>
                                            <option value="4">¥ CNY</option>
                                            <option value="5">৳ BDT</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select  onchange="window.location.href = this.value;">
                                            <option value="{{ url('/profileen') }}">English</option>
                                            <option value="{{ url('/profilear') }}">العربية</option>

                                        </select>
                                    </li>

                                    <li><a href="{{ route('auth.login') }}"><i class="mdi mdi-account"></i>{{ __("profile.login") }}</a></li>
                                    <li><a href="{{ route('auth.logout') }}"><i class="mdi mdi-account"></i>{{ __("profile.logout") }}</a></li>
                                    <li><a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-account"></i>{{ __("profile.dashboard") }}</a></li>

                                </ul>
                            </div>
                            <!-- navbar top right Ends -->
                        </div>
                    </div>
                </div>
                <!-- navbar top Ends -->

                <!-- main navbar Start -->
                <div class="navbar-wrapper">
                    <div class="container-lg">
                        <nav class="main-navbar d-lg-flex justify-content-between align-items-center">
                            <!-- desktop logo Start -->
                            <div class="{{asset('desktop-logo d-none d-lg-block') }}">
                                <a href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="Logo"></a>
                            </div>
                            <!-- desktop logo Ends -->
                            <!-- navbar menu Start -->
                            <div class="navbar-menu">
                                <ul class="main-menu">
                                    <li class="position-static menu-item-has-children">
                                        <a href="#">{{ __("profile.women") }}</a>
                                        <!-- sub mega dropdown Start -->
                                        <ul class="sub-mega-dropdown">
                                            <li>
                                                <div class="mega-dropdown-menu">
                                                    <ul class="container mega-dropdown d-flex flex-wrap">
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">New {{ __("profile.new") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.trending") }}</h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.accessories") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::orderByDesc('id')->paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list">
                                                            <img src="{{asset('assets/images/menu-slider-1.png')}}" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- sub mega dropdown Ends -->
                                    </li>
                                    <li class="position-static menu-item-has-children">
                                        <a href="#">{{ __("profile.men") }}</a>
                                        <!-- sub mega dropdown Start -->
                                        <ul class="sub-mega-dropdown">
                                            <li>
                                                <div class="mega-dropdown-menu">
                                                    <ul class="container mega-dropdown d-flex flex-wrap">
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.new") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.trending") }}</h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.accessories") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::orderByDesc('id')->paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list">
                                                            <img src="{{asset('assets/images/menu-slider-1.png')}}" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- sub mega dropdown Ends -->
                                    </li>
                                    <li class="position-static menu-item-has-children">
                                        <a href="#">{{ __("profile.kids") }}</a>
                                        <!-- sub mega dropdown Start -->
                                        <ul class="sub-mega-dropdown">
                                            <li>
                                                <div class="mega-dropdown-menu">
                                                    <ul class="container mega-dropdown d-flex flex-wrap">
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.new") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.trending") }}</h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.accessories") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::orderByDesc('id')->paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list">
                                                            <img src="{{asset('assets/images/menu-slider-1.png')}}" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- sub mega dropdown Ends -->
                                    </li>
                                    <li class="position-static menu-item-has-children">
                                        <a href="#">{{ __("profile.accessories") }}</a>
                                        <!-- sub mega dropdown Start -->
                                        <ul class="sub-mega-dropdown">
                                            <li>
                                                <div class="mega-dropdown-menu">
                                                    <ul class="container mega-dropdown d-flex flex-wrap">
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.new") }}
                                                            </h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.trending") }}</h6>
                                                            @foreach (App\Models\Admin\Category::paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list menu-item-has-children">
                                                            <h6 class="heading-6 font-weight-500 mega-title">{{ __("profile.accessories") }}
                                                            </h6>

                                                            @foreach (App\Models\Admin\Category::orderByDesc('id')->paginate(5) as $category)
                                                            <ul>
                                                                <li><a href="{{ route('filterByCategory',$category->id)  }}">{{ $category->name }}</a></li>

                                                            </ul>
                                                            @endforeach
                                                        </li>
                                                        <li class="mega-dropdown-list">
                                                            <img src="{{asset('assets/images/menu-slider-1.png')}}" alt="">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- sub mega dropdown Ends -->
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">{{ __("profile.pages") }}</a>
                                        <!-- sub menu Start -->
                                        <ul class="sub-menu">
                                            <li><a href="about-page.html">{{ __("profile.about page") }} </a></li>
                                            <li><a href="account-page.html">{{ __("profile.account page") }} </a></li>
                                            <li><a href="cart-page.html">{{ __("profile.cart page") }} </a></li>
                                            <li><a href="category.html"> {{ __("profile.category page") }}</a></li>
                                            <li><a href="checkout-page.html"> {{ __("profile.checkout page") }}</a></li>
                                            <li><a href="contact-page.html">{{ __("profile.contact page") }} </a></li>
                                            <li><a href="login-page.html">{{ __("profile.login page") }}  </a></li>
                                            <li><a href="product-details-page.html">{{ __("profile.details page") }}</a></li>
                                            <li><a href="signup-page.html">{{ __("profile.sign up page") }}</a></li>
                                        </ul>
                                        <!-- sub menu Ends -->
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar menu Ends -->
                            <div class="{{asset('navbar-search mt-15 search-style-5')}}">
                                <div class="search-select">
                                    <select onchange="window.location.href = '{{ route('filterByCategory', '') }}/' + this.value;">
                                        <option value="">{{ __("profile.all") }}</option>
                                        @foreach (App\Models\Admin\Category::get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <form action="{{ route('search') }}" method="GET" class="search-input">
                                    <input type="text" name="search" placeholder="Search"  value="">
                                    <button type="submit"><i class="lni lni-search-alt"></i></button>

                                </form>

                            </div>

                                <!-- navbar search Ends -->
                                <!-- navbar cart start -->
                                <div class="navbar-cart">
                                    <a class="{{asset('icon-btn primary-icon-text icon-text-btn')}}" href="javascript:void(0)">
                                        <img src="{{asset('assets/images/icon-svg/cart-1.svg')}}" alt="Icon">
                                        <span class="icon-text text-style-1">{{ count((array) session('cart')) }}</span>
                                    </a>

                                    <div class="navbar-cart-dropdown">
                                        <div class="checkout-style-2">
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                            <div class="checkout-header d-flex justify-content-between">
                                                <h6 class="title">{{ __("profile.shopping cart") }} </h6>
                                            </div>

                                            <div class="checkout-table">
                                                <table class="table">
                                                    <tbody>
                                                        @if(session('cart'))
                                                        @foreach(session('cart') as $id => $details)
                                                        <tr>
                                                            <td class="checkout-product">
                                                                <div class="product-cart d-flex">
                                                                    <div class="product-thumb">
                                                                        <img src="{{asset('assets/images/product-cart/product-1.png')}}"
                                                                            alt="Product">
                                                                    </div>
                                                                    <div class="product-content media-body">
                                                                        <h5 class="title">
                                                                            <a href="product-details-page.html">{{ isset($details['name'])? $details['name'] : '' }}</a>
                                                                        </h5>
                                                                        <ul>


                                                                            <li>
                                                                                <form action="{{ route('remove_from_cart', ['id' => $id]) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="delete-button">
                                                                                        <i class="mdi mdi-delete"></i>
                                                                                        <span class="sr-only">{{ __("profile.remove") }}</span>
                                                                                    </button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="checkout-quantity">
                                                                <div class="product-quantity d-inline-flex">
                                                                    <button type="button" id="sub" class="sub">
                                                                        <i class="mdi mdi-minus"></i>
                                                                    </button>
                                                                    <input type="text" value={{ $details['quantity'] }}>
                                                                    <button type="button" id="add" class="add">
                                                                        <i class="mdi mdi-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="checkout-price">
                                                                <p class="price">${{ $details['price'] }}</p>
                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="checkout-footer">
                                                <div class="checkout-sub-total d-flex justify-content-between">
                                                    <p class="value">Subtotal Price:</p>
                                                    <p class="price">${{ $total }}</p>
                                                </div>
                                                <div class="checkout-btn">
                                                    <a href="{{ route('cart') }}" class="main-btn primary-btn-border">
                                                        {{ __("profile.view cart") }}</a>
                                                    <a href="{{ route('checkout') }}" class="main-btn primary-btn">{{ __("profile.checkout see") }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- navbar cart Ends -->
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- main navbar Ends -->
            </div>
            <div class="overlay-7"></div>
        </header>
    </div>
    <!--====== Navbar Style 7 Part Ends ======-->
