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
        // Start building the query
        $optionvalues = OptionValue::query();

        // Apply search filter if 'search' is filled
        $optionvalues->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('value', 'LIKE', '%' . $search . '%');
        });

        // Apply exact name filter if 'name' is filled
        $optionvalues->when(request()->filled('value'), function ($query) {
            $query->where('value', request()->value);
        });

        // Apply ordering and pagination
        $optionvalues = $optionvalues->orderByDesc('id')->paginate(5);

        // Return the result as a compacted array
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
