<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bank_accounts';
    public $timestamps = false;

    protected $fillable = [
        'banco', 'numero_cuenta', 'ruta', 'beneficiario', 'cedula_rif', 'correo_electronico', 'create_at', 'update_at'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}


