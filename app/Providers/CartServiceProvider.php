<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
              // Share cart data with specific views (like navbar)
              View::composer('*', function ($view) {
                if (auth()->check()) {
                    $cart = Cart::where('user_id', auth()->id())->first();
                    $cartProducts = $cart ? CartProduct::where('cart_id', $cart->id)->with('product')->get() : collect();

                    // Calculate subtotal
                    $subtotal = $cartProducts->sum(function ($cartProduct) {
                        return $cartProduct->product->price * $cartProduct->quantity;
                    });
                } else {
                    $cartProducts = collect(); // Empty collection if not logged in
                    $subtotal = 0; // No subtotal if not logged in
                }

                // Share cartProducts and subtotal with all views
                $view->with([
                    'cartProducts' => $cartProducts,
                    'subtotal' => $subtotal
                ]);
            });
    }
}
