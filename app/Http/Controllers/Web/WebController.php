<?php

namespace App\Http\Controllers\Web;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
// app/Http/Controllers/CartController.php
public function index()
{
    // Get the authenticated user's cart
    $cart = cart::where('user_id', Auth::id())->with('products')->first();

    // If the cart is empty or doesn't exist, pass an empty array
    $cartItems = $cart ? $cart->products : [];
    $products = Product::get(); // Optional: if you need all products for other purposes

    return view('Web.Pages.index', compact('cartItems', 'products'));
}




}
