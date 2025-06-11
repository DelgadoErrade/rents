<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('types_properties_id')->constrained('types_properties')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nombre_inmueble', 45)->nullable();
            $table->string('calle', 45);
            $table->string('piso', 45)->nullable();
            $table->string('numero', 45);
            $table->string('sector_urbanizacion', 45);
            $table->string('estado', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
