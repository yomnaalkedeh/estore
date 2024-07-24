<?php
namespace App\Services;

use App\Models\Admin\Payment;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService
{

    public function all()
    {
        $payments = Payment::query();

        $payments->when(request()->filled('search'), function ($query) {
    $search = request()->search;
    $query->where('name', 'LIKE', '%' . $search . '%')
       ;

        });


        $payments->when(request()->filled('name'), function ($query) {
    $query->where('name', request()->name);
        });
   return  $payments = $payments->orderBy('id')->paginate(4);
     }

     public function store(array $data)
    {
        return Payment::create($data);
    }
    public function edit(string $id)
    {
        $payment = Payment::find($id);

        return $payment;
    }
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);

        $payment->payment_method = $request->payment_method;

        $payment->save();

        return $payment;
    }
    public function destroy(int $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
    }

    }



