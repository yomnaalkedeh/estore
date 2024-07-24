<?php
namespace App\Services;


use App\Models\Option;
use App\Models\OptionValue;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreOptionValueRequest;
use App\Http\Requests\UpdateOptionValueRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class OptionValueService
{

    public function all()
    {
        $optionvalues = OptionValue::query();

        $optionvalues->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('name', 'LIKE', '%' . $search . '%');
        });

        $optionvalues->when(request()->filled('name'), function ($query) {
            $query->where('name', request()->name);
        });
        $optionvalues = OptionValue::orderByDesc('id')->paginate(5);

        return compact('optionvalues');
    }

    public function create()
    {
        $options = Option::all();

        return compact('options');
    }

    public function store(Array $data)
    {
        $optionvalue = OptionValue::create($data);
        return $optionvalue;
    }
    public function edit(string $id)
    {
        return OptionValue::findOrFail($id);
    }

    public function update(UpdateOptionValueRequest $request, string $id)
    {
        $optionvalue = OptionValue::find($id);
        $optionvalue->value = $request->value;
        $optionvalue->option_id = $request->option_id;
        $optionvalue->save();

        return $optionvalue;
    }

    public function destroy(int $id)
    {
        $optionvalue = OptionValue::find($id);
        $optionvalue->delete();
    }
}
