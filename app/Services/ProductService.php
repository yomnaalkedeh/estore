<?php
namespace App\Services;

use App\Models\Admin\Product;
use App\Models\Admin\Category;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{

    public function all()
    {
        $products = Product::query();

        $products->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('name', 'LIKE', '%'. $search. '%');
        });

        $products->when(request()->filled('name'), function ($query) {
            $query->where('name', request()->name);
        });

        $categories = Category::with('products');
        $products = $products->with('category')->orderBy('id')->paginate(3);

        return compact('products', 'categories');
    }
    public function create()
    {
        $categories = Category::all();

        return compact('categories');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $product = Product::create($data);



        return $product;
    }

    public function edit(string $id)
    {
        $product = Product::find($id);

        return $product;
    }
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);

        return $product;
    }
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
