<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private CategoryService $categoryService;


    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {

$categories = $this->categoryService->getFilteredCategories();
$categories = $this->categoryService->all();
return view('Admin.category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $this->categoryService->store($data);

       return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->categoryService->edit($id);
        return view('Admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $this->categoryService->updateCategory($request, $id);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->categoryService->destroy($id);

        return redirect()->route('categories.index');
    }

}
