<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                // Ensure the file is valid
                if ($file->isValid()) {
                    // Get original extension and create a unique filename
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                    // Define the path where the file should be moved
                    $path = 'uploads/products/';

                    // Ensure public path is used and file is moved correctly
                    $file->move(public_path($path), $filename);

                    // Store the full path in the array
                    $images[] = $path . $filename;
                }
            }

            // Check if images were uploaded
            if (!empty($images)) {
                $data['images'] = json_encode($images);
            } else {
                $data['images'] = null;
            }
        }

        // Create the product
        $product = Product::create($data);

        // Attach selected option values to the product
        $optionValues = $request->input('option_values', []);  // This should match the form name

        foreach ($optionValues as $optionId => $values) {
            foreach ($values as $valueId) {
                $product->optionValues()->attach($valueId);
            }
        }

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
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
         $categories = Category::all();
         $product = Product::findOrFail($id); // Use findOrFail to throw a 404 if not found

         return view('Admin.product.edit', compact('product', 'categories'));
     }

     /**
      * Update the specified resource in storage.
      */
      public function update(UpdateProductRequest $request, string $id)
      {
          $product = Product::find($id);

          // Handle image upload
          if ($request->hasFile('images')) {
              $images = [];

              // Check if files are valid
              foreach ($request->file('images') as $file) {
                  if ($file->isValid()) {
                      $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                      $path = 'uploads/products/';
                      $file->move(public_path($path), $filename);
                      $images[] = $path . $filename;
                  }
              }

              // Update the images field
              if (!empty($images)) {
                  // Delete old images if any
                  $oldImages = json_decode($product->images, true);
                  if ($oldImages) {
                      foreach ($oldImages as $oldImage) {
                          if (file_exists(public_path($oldImage))) {
                              unlink(public_path($oldImage));
                          }
                      }
                  }

                  $product->images = json_encode($images);
              }
          }

          // Update other product details
          $product->update([
              'name' => $request->name,
              'desc' => $request->desc,
              'category_id' => $request->category_id,
              'price' => $request->price,
          ]);

          // Update option values if applicable
          if ($request->has('option_values')) {
              $optionValues = $request->input('option_values', []);

              // Detach old option values
              $product->optionValues()->detach();

              // Attach new option values
              foreach ($optionValues as $optionId => $values) {
                  foreach ($values as $valueId) {
                      $product->optionValues()->attach($valueId);
                  }
              }
          }

          return redirect()->route('products.index')
                           ->with('success', 'Product updated successfully.');
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
