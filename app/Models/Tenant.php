<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';
    public $timestamps = false;

    protected $fillable = [
        'inquilino', 'clave', 'tipo_usuario', 'nombre_inquilino', 'responsable_inquilino', 'correo_electronico', 'create_at', 'update_at'
    ];

    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}

