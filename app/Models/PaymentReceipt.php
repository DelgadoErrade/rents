<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentReceipt extends Model
{
    use HasFactory;

    protected $table = 'payment_receipts';
    public $timestamps = false;

    protected $fillable = [
        'payments_id', 'numero_recibo', 'fecha_validacion', 'validador', 'create_at', 'update_at'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id');
    }
}


