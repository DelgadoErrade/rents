<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';
    public $timestamps = false;

    protected $fillable = [
        'types_properties_id', 'nombre_inmueble', 'calle', 'piso', 'numero', 'sector_urbanizacion', 'estado', 'create_at', 'updated_at'
    ];

    public function typeProperty()
    {
        return $this->belongsTo(TypeProperty::class, 'types_properties_id');
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}
