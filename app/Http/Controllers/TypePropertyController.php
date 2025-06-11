<?php

namespace App\Http\Controllers;

use App\Models\TypeProperty;
use Illuminate\Http\Request;

class TypePropertyController extends Controller
{
    public function index()
    {
        return TypeProperty::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo_inmueble' => 'required|string|max:45',
            'create_at' => 'nullable|date',
            'update_at' => 'nullable|date',
        ]);

        return TypeProperty::create($data);
    }

    public function show(TypeProperty $typeProperty)
    {
        return $typeProperty;
    }

    public function update(Request $request, TypeProperty $typeProperty)
    {
        $data = $request->validate([
            'tipo_inmueble' => 'sometimes|string|max:45',
            'create_at' => 'nullable|date',
            'update_at' => 'nullable|date',
        ]);

        $typeProperty->update($data);
        return $typeProperty;
    }

    public function destroy(TypeProperty $typeProperty)
    {
        $typeProperty->delete();
        return response()->noContent();
    }
}
