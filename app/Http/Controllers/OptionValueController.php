<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\OptionValue;
use App\Services\OptionValueService;
use App\Http\Requests\StoreOptionValueRequest;
use App\Http\Requests\UpdateOptionValueRequest;

class OptionValueController extends Controller
{
    protected $optionvalueService;

    public function __construct(OptionValueService $optionvalueService)
    {
        $this->optionvalueService = $optionvalueService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->optionvalueService->all();

        return view('Admin.optionvalue.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->optionvalueService->create();
        return view('Admin.optionvalue.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOptionValueRequest $request)
    {
        $data = $request->validated();

        $this->optionvalueService->store($data);

       return redirect()->route('optionvalues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OptionValue $optionValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $options=Option::all();
        $optionvalue = $this->optionvalueService->edit($id);
        return view('Admin.optionvalue.edit', compact('optionvalue','options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOptionValueRequest $request, string $id)
    {
        $this->optionvalueService->update($request, $id);

        return redirect()->route('optionvalues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->optionvalueService->destroy($id);

        return redirect()->route('optionvalues.index');
    }
}
