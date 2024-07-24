<?php
namespace App\Services;

use App\Models\User;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{

    public function all()
    {
        $orders = Order::query();

        $orders->when(request()->filled('search'), function ($query) {
            $search = request()->search;
            $query->where('name', 'LIKE', '%' . $search . '%');
        });

        $orders->when(request()->filled('name'), function ($query) {
            $query->where('name', request()->name);
        });

        $users = User::with('orders');
        $orders = $orders->with('user')->orderBy('id')->paginate(4);

        return compact('orders', 'users');
    }


    public function create()
    {
        return User::all();
    }

    public function store(array $data)
    {
        return Order::create($data);
    }
    public function edit($id)
    {
        $users= User::all();
        return Order::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }
    public function delete(int $id)
    {
        $order = Order::find($id);
        $order->delete();
    }
}
