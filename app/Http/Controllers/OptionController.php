<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Services\OptionService;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;

class OptionController extends Controller
{

    protected $optionService;

    public function __construct(OptionService $optionService)
    {
        $this->optionService = $optionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->optionService->all();

        return view('Admin.option.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.option.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionRequest $request)
    {
        $data = $request->validated();

        $this->optionService->store($data);

       return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $options = $this->optionService->edit($id);
        return view('Admin.option.edit', compact('options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionRequest $request, string $id)
    {
        $this->optionService->update($request, $id);

        return redirect()->route('options.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->optionService->destroy($id);

        return redirect()->route('options.index');
    }
}
