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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periods_id')->constrained('periods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('bank_accounts_id')->constrained('bank_accounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('fecha');
            $table->string('referencia', 10);
            $table->string('de_banco', 45);
            $table->decimal('monto', 10, 2);
            $table->char('validado', 2)->default('NO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
