<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the periods.
     */
    public function index()
    {
        $periods = Period::with(['property', 'tenant', 'payments'])->get();
        return response()->json($periods);
    }

    /**
     * Store a newly created period in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'properties_id' => 'required|exists:properties,id',
            'tenants_id' => 'required|exists:tenants,id',
            'fecha_inicial' => 'required|date',
            'meses_alquiler' => 'required|integer|min:1',
            'canon_mensual' => 'required|numeric|min:0',
            'monto_deposito' => 'nullable|numeric|min:0',
        ]);

        $period = Period::create($validated);
        return response()->json($period, 201);
    }

    /**
     * Display the specified period.
     */
    public function show(Period $period)
    {
        $period->load(['property', 'tenant', 'payments']);
        return response()->json($period);
    }

    /**
     * Update the specified period in storage.
     */
    public function update(Request $request, Period $period)
    {
        $validated = $request->validate([
            'properties_id' => 'required|exists:properties,id',
            'tenants_id' => 'required|exists:tenants,id',
            'fecha_inicial' => 'required|date',
            'meses_alquiler' => 'required|integer|min:1',
            'canon_mensual' => 'required|numeric|min:0',
            'monto_deposito' => 'nullable|numeric|min:0',
        ]);

        $period->update($validated);
        return response()->json($period);
    }

    /**
     * Remove the specified period from storage.
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return response()->json(null, 204);
    }
}
