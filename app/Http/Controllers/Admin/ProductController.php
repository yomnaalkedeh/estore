<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productService->all();

        return view('Admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->productService->create();

        return view('Admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->store($request);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
     $productImg= $product->getMedia('product_img');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $product = $this->productService->edit($id);

        return view('Admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(int $id)
     {
         $this->productService->destroy($id);

         return redirect()->route('products.index');
     }



}
