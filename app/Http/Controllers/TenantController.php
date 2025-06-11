<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the tenants.
     */
    public function index()
    {
        $tenants = Tenant::with('periods')->get();
        return response()->json($tenants);
    }

    /**
     * Store a newly created tenant in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'inquilino' => 'required|string|max:20|unique:tenants,inquilino',
            'clave' => 'required|string|min:6',
            'tipo_usuario' => 'required|string|size:3',
            'nombre_inquilino' => 'required|string|max:45',
            'responsable_inquilino' => 'required|string|max:45',
            'correo_electronico' => 'required|email|max:100',
        ]);

        // Hash the password before storing
        $validated['clave'] = Hash::make($validated['clave']);

        $tenant = Tenant::create($validated);
        return response()->json($tenant, 201);
    }

    /**
     * Display the specified tenant.
     */
    public function show(Tenant $tenant)
    {
        $tenant->load('periods');
        return response()->json($tenant);
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'inquilino' => 'required|string|max:20|unique:tenants,inquilino,' . $tenant->id,
            'clave' => 'nullable|string|min:6',
            'tipo_usuario' => 'required|string|size:3',
            'nombre_inquilino' => 'required|string|max:45',
            'responsable_inquilino' => 'required|string|max:45',
            'correo_electronico' => 'required|email|max:100',
        ]);

        if (!empty($validated['clave'])) {
            $validated['clave'] = Hash::make($validated['clave']);
        } else {
            unset($validated['clave']);
        }

        $tenant->update($validated);
        return response()->json($tenant);
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return response()->json(null, 204);
    }
}
