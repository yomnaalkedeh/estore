<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Location;
use Illuminate\Support\Facades\Auth;
use App\Models\CartProduct;

class CartController extends Controller
{

    public function cart()
    {
         // Check if the user is authenticated
            if (!Auth::check()) {
                return redirect()->route('auth.login')->with('error', 'You need to be logged in to view your cart.');
            }

            // Get the authenticated user's cart
            $cart = Cart::where('user_id', Auth::id())->with('products')->first();

            // If the cart is empty or doesn't exist, pass an empty array
            $cartItems = $cart ? $cart->products : [];
                $product=Product::get();
                    return view('Web.Pages.cart',compact('product','cartItems'));
    }



    public function addToCart(Request $request, $productId)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        // Find the product by ID
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Get the quantity from the request, default is 1
        $quantity = $request->input('quantity', 1);

        // Get or create the cart for the authenticated user
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $productId)->first();

        if ($existingProduct) {
            // If product exists in the cart, update the quantity
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $existingProduct->pivot->quantity + $quantity
            ]);
        } else {
            // Attach the new product to the cart with the quantity
            $cart->products()->attach($productId, ['quantity' => $quantity]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    public function remove($id)
    {

        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->products()->detach($id);  // Assuming products are in a many-to-many relationship
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function checkout(){

        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'You need to be logged in to view your cart.');
        }
        $cart = Cart::where('user_id', auth()->id())->first();

        // Retrieve cart products with the associated product details
        $cartProducts = CartProduct::where('cart_id', $cart->id)
                                   ->with('product')  // Load associated product
                                   ->get();

        // Calculate the subtotal
        $total = $cartProducts->sum(function ($cartProduct) {
            return $cartProduct->product->price * $cartProduct->quantity;
        });

        return view('Web.Pages.checkout', compact('cartProducts', 'total'));




    }

    public function showCart()
{
    // Assuming you have a Cart and CartProduct model
    $cart = cart::where('user_id', auth()->id())->first();  // Get the cart for the logged-in user
    $cartProducts = CartProduct::where('cart_id', $cart->id)
                               ->with('product')  // Eager load the associated product
                               ->get();
                               $cartProducts = CartProduct::where('cart_id', $cart->id)
                               ->with(['product.optionValues'])  // Load product and its option values
                               ->get();

    // Calculate the subtotal
    $subtotal = $cartProducts->sum(function ($cartProduct) {
        return $cartProduct->product->price * $cartProduct->quantity;
    });

    return view('Web.Pages.cart', compact('cartProducts', 'subtotal'));
}

}

