<?php
namespace App\Services;

use App\Models\Admin\State;
use App\Models\Admin\Product;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class StateService
{

    public function all()
    {
        $states = State::query();

        $states->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('name', 'LIKE', '%'. $search. '%');
        });

        $states->when(request()->filled('name'), function ($query) {
            $query->where('name', request()->name);
        });

        $states = $states->orderBy('id')->paginate(4);

        return compact('states');
    }

    public function store(StoreStateRequest $request)
    {
        $data = $request->validated();

        $state = State::create($data);

        return $state;
    }
    public function edit(string $id)
    {
        $state = State::findOrFail($id);

        return $state;
    }
    public function update(UpdateStateRequest $request, string $id)
    {
        $data = $request->validated();

        $state = State::findOrFail($id);
        $state->update($data);

        return $state;
    }

    public function destroy(int $id)
    {
        $state = State::findOrFail($id);
        $state->delete();
    }

}
