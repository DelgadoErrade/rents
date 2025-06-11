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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
             $table->string('banco', 45);
            $table->string('numero_cuenta', 20);
            $table->string('ruta', 25)->nullable();
            $table->string('beneficiario', 45);
            $table->string('cedula_rif', 14);
            $table->string('correo_electronico', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
