<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $data = $this->orderService->all();

        return view('Admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->orderService->create();
    return view('Admin.order.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user_id;

        $this->orderService->store($data);

        return redirect()->route('orders.index');
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
    $users = User::all();
    $order = $this->orderService->edit($id);
    return view('Admin.order.edit', compact('order','users'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id)
    {
        $data = $request->validated();


        $this->orderService->update($id, $data);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->orderService->delete($id);
        return redirect()->route('orders.index');
    }
}
