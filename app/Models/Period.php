<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Period extends Model
{
    use HasFactory;

    protected $table = 'periods';
    public $timestamps = false;

    protected $fillable = [
        'properties_id', 'tenants_id', 'fecha_inicial', 'meses_alquiler', 'canon_mensual', 'monto_deposito', 'create_at', 'update_at'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenants_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'properties_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}


