<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     */
    public function index()
    {
        $properties = Property::with('typeProperty')->get();
        return response()->json($properties);
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'types_properties_id' => 'required|exists:types_properties,id',
            'nombre_inmueble' => 'nullable|string|max:45',
            'calle' => 'required|string|max:45',
            'piso' => 'nullable|string|max:45',
            'numero' => 'required|string|max:45',
            'sector_urbanizacion' => 'required|string|max:45',
            'estado' => 'required|string|max:45',
        ]);

        $property = Property::create($validated);
        return response()->json($property, 201);
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        $property->load('typeProperty', 'periods');
        return response()->json($property);
    }

    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'types_properties_id' => 'required|exists:types_properties,id',
            'nombre_inmueble' => 'nullable|string|max:45',
            'calle' => 'required|string|max:45',
            'piso' => 'nullable|string|max:45',
            'numero' => 'required|string|max:45',
            'sector_urbanizacion' => 'required|string|max:45',
            'estado' => 'required|string|max:45',
        ]);

        $property->update($validated);
        return response()->json($property);
    }

    /**
     * Remove the specified property from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json(null, 204);
    }
}

