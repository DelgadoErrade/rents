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
        Schema::create('payments_receipts', function (Blueprint $table) {
            $table->id();
             $table->foreignId('payments_id')->constrained('payments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('numero_recibo', 9);
            $table->date('fecha_validacion');
            $table->string('validador', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_receipts');
    }
};
