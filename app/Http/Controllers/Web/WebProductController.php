<?php

namespace App\Http\Controllers\Web;

use Share;
use App\Models\Rate;
use App\Models\Option;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\OptionProduct;
use App\Models\Admin\Category;
use App\Models\Admin\Favorite;
use App\Http\Controllers\Controller;

class WebProductController extends Controller
{
   public function index(Request $request){

    $products=Product::paginate(9);

    return view('Web.Pages.product',compact('products'));
   }




   public function search(Request $request)
   {
    $products = Product::query();

    $products->when(request()->filled('search'), function ($query) {
        $search = request()->search;
        $query->where("name", 'LIKE', '%' . $search . '%')
            ->orWhere("desc", 'LIKE', '%' . $search . '%')
            ;
    })
    ->when(request()->filled('name'), function ($query) {
        $query->where('name', request()->name);
    })
    ->when(request()->filled('category_id'), function ($query) {
        $query->where('category_id', request()->category_id);
    });



       $products = $products->paginate();
       $categories = Category::all();
       return view('Web.Pages.product', compact('products','categories'));
   }

   public function filterByCategory(Category $category)
{
    $products = Product::where('category_id', $category->id)->paginate(10);
    $categories = Category::all();
    return view('Web.Pages.product', compact('products', 'categories'));
}

    public function productDetail(int $id){

        $product = Product::findOrFail($id);



        return view('Web.Pages.product-details',compact('product'));

    }





public function addToFavorites($productId)
{
    $product = Product::findOrFail($productId);

    $favorite = new Favorite();
    $favorite->favoritable_id = $product->id;
    $favorite->favoritable_type = 'App\Models\Admins\Product';

    auth()->user()->favorites()->save($favorite);

    return redirect()->back();
}
public function review(Product $product, Request $request)
{

    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
        ]);



        $review = new Review;
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

}


}


