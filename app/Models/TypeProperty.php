<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeProperty extends Model
{
    use HasFactory;

    protected $table = 'types_properties';
    public $timestamps = false;

    protected $fillable = [
        'tipo_inmueble', 'create_at', 'update_at'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'types_properties_id');
    }
}
