<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::with(['period', 'bankAccount', 'receipt'])->get();
        return response()->json($payments);
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'periods_id' => 'required|exists:periods,id',
            'bank_accounts_id' => 'required|exists:bank_accounts,id',
            'fecha' => 'required|date',
            'referencia' => 'required|string|max:10',
            'de_banco' => 'required|string|max:45',
            'monto' => 'required|numeric',
            'validado' => 'required|string|in:NO,SI',
        ]);

        $payment = Payment::create($validated);
        return response()->json($payment, 201);
    }

    /**
     * Display the specified payment.
     */
    public function show(Payment $payment)
    {
        $payment->load(['period', 'bankAccount', 'receipt']);
        return response()->json($payment);
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'periods_id' => 'required|exists:periods,id',
            'bank_accounts_id' => 'required|exists:bank_accounts,id',
            'fecha' => 'required|date',
            'referencia' => 'required|string|max:10',
            'de_banco' => 'required|string|max:45',
            'monto' => 'required|numeric',
            'validado' => 'required|string|in:NO,SI',
        ]);

        $payment->update($validated);
        return response()->json($payment);
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(null, 204);
    }
}
