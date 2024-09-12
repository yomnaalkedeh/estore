<?php
namespace App\Services;

use App\Models\Admin\Product;
use App\Models\Admin\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{

public function all()
{
    // Start building the query
    $products = Product::query();

    // Apply search filter if 'search' is filled
    $products->when(request()->filled('search'), function ($query) {
        $search = request()->search;
        $query->where('name', 'LIKE', '%' . $search . '%');
    });

    // Apply exact name filter if 'name' is filled
    $products->when(request()->filled('name'), function ($query) {
        $query->where('name', request()->name);
    });

    // Finalize the query with category relationship and pagination
    $products = $products->with('category')->orderBy('id')->paginate(3);

    // Fetch categories if needed for the view
    $categories = Category::with('products')->get();

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
        if($request->has('image')){
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/products/';
            $file->move($path,$filename);

            if(File::exists($product->image)){
                File::delete($product->image);
            }
        }
        $product->update([
            'image' => $path.$filename,
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
