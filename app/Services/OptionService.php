<?php
namespace App\Services;


use App\Models\Option;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class OptionService
{

    public function all()
    {
        $options = Option::query();

        $options->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('name', 'LIKE', '%' . $search . '%');
        });

        $options->when(request()->filled('name'), function ($query) {
            $query->where('name', request()->name);
        });
        $options = Option::orderByDesc('id')->paginate(5);

        return compact('options');
    }
    public function store(array $data)
    {

        $option = Option::create($data);
        return $option;
    }
    public function edit(string $id)
    {
        return Option::findOrFail($id);
    }

    public function update(UpdateOptionRequest $request, string $id)
    {
        $option = Option::find($id);
        $option->name = $request->name;
        $option->save();

        return $option;
    }

    public function destroy(int $id)
    {
        $option = Option::find($id);
        $option->delete();
    }

}
