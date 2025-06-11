<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    public $timestamps = false;

    protected $fillable = [
        'periods_id', 'bank_accounts_id', 'fecha', 'referencia', 'de_banco', 'monto', 'validado', 'create_at', 'update_at'
    ];

    public function period()
    {
        return $this->belongsTo(Period::class, 'periods_id');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_accounts_id');
    }

    public function receipt()
    {
        return $this->hasOne(PaymentReceipt::class, 'payments_id');
    }
}

