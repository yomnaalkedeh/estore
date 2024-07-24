<?php
namespace App\Services;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function all()
    {


        $categories = Category::with('subcategories')->orderByDesc('id')->paginate(5);

        return $categories;
    }

    public function getFilteredCategories()
    {
        $categories = Category::query();

        $categories->when(request()->filled('search'), function ($query) {
        $search = request()->search;
        $query->where('name', 'LIKE', '%' . $search . '%')
       ;

        });


        $categories->when(request()->filled('name'), function ($query) {
        $query->where('name', request()->name);
        });

        return $categories;

    }

    public function store(array $data)
    {

        $category = Category::create($data);
        return $category;
    }

    public function edit(string $id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return $category;
    }


    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
