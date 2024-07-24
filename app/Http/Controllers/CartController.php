<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Location;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart()
    {
     $product=Product::get();
        return view('Web.Pages.cart',compact('product'));
    }
    public function addToCart(Request $request,$id)
    {

        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');


        if(!$cart) {
            $cart[$id] = [
                "name" => $product->name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
        return view('Web.Pages.cart');
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


        $locations=Location::get();

        return view('Web.Pages.checkout',compact('locations'));


    }
}

