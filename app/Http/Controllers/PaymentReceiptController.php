<?php

namespace App\Http\Controllers;

use App\Models\PaymentReceipt;
use Illuminate\Http\Request;

class PaymentReceiptController extends Controller
{
    // Listar todos los recibos de pago
    public function index(Request $request)
    {
        $query = PaymentReceipt::with('payment');

        // Filtro por validador (opcional)
        if ($request->has('validador')) {
            $query->where('validador', 'like', '%' . $request->validador . '%');
        }

        // Ordenamiento por fecha
        $query->orderBy('fecha_validacion', 'desc');

        return response()->json($query->get());
    }

    // Crear un nuevo recibo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payments_id' => 'required|exists:payments,id',
            'numero_recibo' => 'required|string|max:9',
            'fecha_validacion' => 'required|date',
            'validador' => 'required|string|max:45',
        ]);

        $recibo = PaymentReceipt::create($validated);

        return response()->json($recibo, 201);
    }

    // Mostrar un recibo específico
    public function show($id)
    {
        $recibo = PaymentReceipt::with('payment')->findOrFail($id);
        return response()->json($recibo);
    }

    // Actualizar un recibo existente
    public function update(Request $request, $id)
    {
        $recibo = PaymentReceipt::findOrFail($id);

        $validated = $request->validate([
            'numero_recibo' => 'sometimes|string|max:9',
            'fecha_validacion' => 'sometimes|date',
            'validador' => 'sometimes|string|max:45',
        ]);

        $recibo->update($validated);

        return response()->json($recibo);
    }

    // Eliminar un recibo
    public function destroy($id)
    {
        $recibo = PaymentReceipt::findOrFail($id);
        $recibo->delete();

        return response()->json(['message' => 'Recibo eliminado correctamente.']);
    }
}
