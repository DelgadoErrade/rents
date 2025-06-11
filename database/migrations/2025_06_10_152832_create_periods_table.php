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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('properties_id')->constrained('properties')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tenants_id')->constrained('tenants')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('fecha_inicial');
            $table->tinyInteger('meses_alquiler');
            $table->decimal('canon_mensual', 10, 2);
            $table->decimal('monto_deposito', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
