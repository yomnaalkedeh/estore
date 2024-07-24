<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Payment;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function index()
    {

        $payments = $this->paymentService->all();
        return view('Admin.payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->validated();

        $this->paymentService->store($data);

        return redirect()->route('payments.index');
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
        $payments = $this->paymentService->edit($id);

        return view('Admin.payment.edit', compact('payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, string $id)
    {
        $payment = Payment::find($id);

        $payment->payment_method = $request->payment_method;

        $payment->save();

        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->paymentService->destroy($id);

        return redirect()->route('payments.index');
    }

}
