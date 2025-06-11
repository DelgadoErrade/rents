<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the bank accounts.
     */
    public function index()
    {
        $accounts = BankAccount::with('payments')->get();
        return response()->json($accounts);
    }

    /**
     * Store a newly created bank account in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'banco' => 'required|string|max:45',
            'numero_cuenta' => 'required|string|max:20',
            'ruta' => 'nullable|string|max:25',
            'beneficiario' => 'required|string|max:45',
            'cedula_rif' => 'required|string|max:14',
            'correo_electronico' => 'required|email|max:45',
        ]);

        $account = BankAccount::create($validated);
        return response()->json($account, 201);
    }

    /**
     * Display the specified bank account.
     */
    public function show(BankAccount $bankAccount)
    {
        $bankAccount->load('payments');
        return response()->json($bankAccount);
    }

    /**
     * Update the specified bank account in storage.
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        $validated = $request->validate([
            'banco' => 'required|string|max:45',
            'numero_cuenta' => 'required|string|max:20',
            'ruta' => 'nullable|string|max:25',
            'beneficiario' => 'required|string|max:45',
            'cedula_rif' => 'required|string|max:14',
            'correo_electronico' => 'required|email|max:45',
        ]);

        $bankAccount->update($validated);
        return response()->json($bankAccount);
    }

    /**
     * Remove the specified bank account from storage.
     */
    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return response()->json(null, 204);
    }
}
