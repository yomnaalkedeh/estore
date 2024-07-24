<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\State;
use Illuminate\Http\Request;
use App\Services\StateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    protected $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->stateService->all();

        return view('Admin.state.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.state.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(StoreStateRequest $request)
     {
         $state = $this->stateService->store($request);

         return redirect()->route('states.index');
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
        $data = $this->stateService->edit($id);

        return view('Admin.state.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, string $id)
    {
        $state = $this->stateService->update($request, $id);

        return redirect()->route('states.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->stateService->destroy($id);

        return redirect()->route('states.index');
    }
}
